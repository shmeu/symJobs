<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use AppBundle\Form\JobType;

use AppBundle\Entity\Job;
use AppBundle\Entity\Oras;


class JobController extends Controller {
	
	
	public function addAction(Request $request){
		
		$form = $this->createForm(JobType::class);
		
		$form->handleRequest($request);
		
		
		if ($form->isSubmitted() && $form->isValid()) {
			
			$job = $form->getData();
//			$job->setDataPublicarii(new \DateTime('today'));
			$em = $this->getDoctrine()->getManager();
			$em->persist($job);
			$em->flush();
			
			$session = new Session();
			$session->getFlashBag()->add('success',	'Jobul a fost postat corect');		
			
			return $this->redirectToRoute('job_list');
		}

		return $this->render('jobs/addForm.html.twig', array(
			'form' => $form->createView(),
		));	

	}
	
	
	public function listAction(){
//		$session = new Session();

		$jobRepo	= $this->getDoctrine()->getRepository('AppBundle:Job');
		$jobs = $jobRepo->findAllSince(new \DateTime('1 month ago'));
		
		dump($jobs);

		
		return $this->render('jobs/list.html.twig', array('jobs' => $jobs));	

	}
	
		
	public function detailAction($id){
		
		$jobRepo	= $this->getDoctrine()->getRepository('AppBundle:Job');
		$job		= $jobRepo->find($id);
		dump($job);
		
		return $this->render('jobs/detail.html.twig', array("job"=> $job));	

	}
	
}
