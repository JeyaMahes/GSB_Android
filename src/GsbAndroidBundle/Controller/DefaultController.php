<?php

namespace GsbAndroidBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@GsbAndroid/Default/index.html.twig');
    }
    // Retourne la liste des visiteurs sous forme d'un tableau d'objets Json
    // Côté client mobile : response sous forme de JSONArray 
    public function getLesVisiteursAction() { 
        
        $rp = $this->getDoctrine()->getManager()->getRepository('GsbAndroidBundle:Visiteur');
        $lesVisiteurs = $rp->findAll();
        return new JsonResponse($lesVisiteurs);
        
    }
    
    // Retourne un visiteur sous forme d'un JSONObject
    // L'entité Visiteur implémente l'interface JsonSerializable
    public function getUnVisiteurAction($login, $mdp) {
        
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('GsbAndroidBundle:Visiteur');
        $leVisiteur = $repository->findOneBy(array('visLogin'=>$login, 'visMdp'=>$mdp));
        
        $response = new JsonResponse($leVisiteur->jsonSerialize());
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    
    // Retourne une réponse sous forme de JSONArray 
    public function getLesPraticiensAction() {
        $em = $this->getDoctrine()->getManager();
        $rp = $em->getRepository('GsbAndroidBundle:Praticien');
        $data = $rp->findAll(); //>getArrayResult();
        if (empty($data)) {
            return new JsonResponse(['message'=> 'Liste vide'], Response::HTTP_NOT_FOUND);
        }
        
        return new JsonResponse($data);
        
    }
    
    // Idem : tableau d'objets Json
    public function getLesPraticiensParVisiteurAction($matricule) {
        $em = $this->getDoctrine()->getManager();
        $rp = $em->getRepository('GsbAndroidBundle:Praticien');
        // Exemple d'utilisation du DQL (plus facile pour récupérer les clés
        // étrangères
        $lesPraticiens = $rp->findByPraVisiteurDQL($matricule);
        
        return new JsonResponse($lesPraticiens);
    }

    // Exemple avec le service Serializer de Symfony
    public function getLesTypesPraticiensAction() {
        $rp = $this->getDoctrine()->getManager()
                ->getRepository('GsbAndroidBundle:TypePraticien');
        
        $typesPraticiens = $rp->findAll();
        // Ici, un exemple d'utilisation du service serializer de Symfony
        // Du coup, pas besoin pas besoin d'implémenter JsonSerializable
        // dans l'entity TypePraticien
        $lesTypesPraticiens = $this->get('serializer')
                ->serialize($typesPraticiens, 'json');
        
        return new Response($lesTypesPraticiens); 
    }
    
    public function getUneDateAction($matricule){
      $rp = $this->getDoctrine()->getManager()
                ->getRepository('GsbAndroidBundle:RapportVisite');
        
        $date = $rp->getMoisAnnee($matricule);
        
        foreach( $date as $uneDate){
            $uneDate = $uneDate["rapDatevisite"]->format('Y-m-d');
        }
        
        
        return new JsonResponse ( $uneDate);
        
    }
    public function getUnRVAction($matricule , $date){
        
        $rp = $this->getDoctrine()->getManager()
                ->getRepository('GsbAndroidBundle:RapportVisite');
        
        
             
        $rv = $rp->getRVByDate($matricule,$date);

        return new JsonResponse($rv);
    }
    
    public function addUnPraticienAction(Request $request) {
            $content = $request->request->get('praticien');
            
            if (!empty($content)) {
                $data = json_decode($content, true);
                
                $praticien = new Praticien();
                $praticien->setPraNom($data['praNom']);       
                $praticien->setPraPrenom($data['praPrenom']);
                $praticien->setPraAdresse($data['praAdresse']);
                $praticien->setPraCp($data['praCp']);
                $praticien->setPraVille($data['praVille']);
                $praticien->setPraCoefnotoriete($data['praCoefNotoriete']);
            
                $em = $this->getDoctrine()->getManager();
            
                // Entity praTypeCode
                $rpTypePraticien = $em->getRepository('VolleyBundle:TypePraticien');
                $praTypeCode = $rpTypePraticien->findOneBy(
                            array('typeCode'=> $data['praTypeCode']));
                $praticien->setPraTypecode($praTypeCode); 
                $rpVisiteur = $em->getRepository('VolleyBundle:Visiteur');
                $praVisiteur = $rpVisiteur->findOneBy(
                            array('visMatricule'=> $data['praVisiteur']));
                $praticien->setPraVisiteur($praVisiteur); 
                $em->persist($praticien);
                $em->flush();
                
            } else {
                throw new BadRequestHttpException("Contenu vide");
            }
            
            return new JsonResponse($praticien);
    }
    
    public function addUnRVAction(Request $request){
        
        $content = $request->request->get('rapportvisite');
            
            if (!empty($content)) {
                $data = json_decode($content, true);
                
                $em= $this->getDoctrine()->getManager();
                $rv = new RapportVisite();
                $rv->setRapBilan($data['rapBilan']);
                $rv->setPraNum($data['praNum']);
                $rv->setRapDateVisite($data['rapDatevisite']);
                $rv->setRapDateRapport($data['rapDaterapport']);
                $rv->setVisMatricule($data['visMatricule']);
                
                $em->persist($rv);
                $em->flush();
            } else {
                throw new BadRequestHttpException("Contenu vide");
            }
            
            return new JsonResponse($rv);
    }
    
            
}
 



