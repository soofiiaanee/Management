<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

//use Client 
use AppBundle\Entity\Client;
use AppBundle\Form\ClientType;
//use Fournisseur
use AppBundle\Entity\Fournisseur;
use AppBundle\Form\FournisseurType;

//use Produit
use AppBundle\Entity\Produit;
use AppBundle\Form\ProduitType;

//use Achat
use AppBundle\Entity\Achat;
use AppBundle\Form\AchatType;

//use Vente
use AppBundle\Entity\Vente;
use AppBundle\Form\VenteType;

class DefaultController extends Controller
{
    
//////////////////////////////////////////////// Page d'acceuil//////////////////////////////////////////////    
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {     
        $produitsManques = $this->listProduitsManques();
        $factures = $this->listFacturesImpayes();
        return $this->render('@App/homepage.html.twig',array('produits'=>$produitsManques,'factures'=>$factures));
    }
    
    
////////////////////////////////////////////////// Gestion Clients /////////////////////////////////////////////     
    
    /**
     * @Route("/creerModifierClient/{id}", name="creerModifierClient")
     */
    public function creerModifierClient(Request $request,$id=null)
    {     
        $em=$this->getDoctrine()->getManager();
        
        if($id)
            {
                $client = $em->getRepository("AppBundle:Client")->find($id);
                
                if($client)
                    {
                        $form= $this->get('form.factory')->create(ClientType::class,$client);
                        
                        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) 
                            {
                                $em->persist($client);
                                $em->flush();
                                
                                $id_client = $client->getId();
                                $request->getSession()->getFlashBag()->add('info', 'Votre client a été bien modifié');
                                return $this->redirectToRoute('showClient', array('id' => $id_client));
                            }
                        return $this->render('@App/Client/editClient.html.twig', array('form' => $form->createView()));    
                    }
                else
                    {
                        $request->getSession()->getFlashBag()->add('info', 'Erreur , Veuilez vérifier votre demande');
                    }
            }
        else
        {
            $client = new Client();
            $form= $this->get('form.factory')->create(ClientType::class,$client);
            
            if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) 
                {
                    $em->persist($client);
                    $em->flush();
                                
                    $id_client = $client->getId();
                    $request->getSession()->getFlashBag()->add('info', 'Votre client a été bien crée');
                    return $this->redirectToRoute('showClient', array('id' => $id_client));
                }
            return $this->render('@App/Client/addClient.html.twig', array('form' => $form->createView()));    
        }
    }
        
    /**
     * @Route("/deleteClient/{id}", name="deleteClient")
     */
    public function deleteClient(Request $request,$id)
    {     
        $em=$this->getDoctrine()->getManager();
        $client = $em->getRepository("AppBundle:Client")->find($id);
        
        $em->remove($client);
        $em->flush();
        
        $request->getSession()->getFlashBag()->add('info', 'Votre client a été bien supprimé');
        $clients = $em->getRepository("AppBundle:Client")->findAll();
        
        return $this->render('@App/Client/listClients.html.twig',array('clients'=>$clients));    
    }
    
    /**
     * @Route("/showClient/{id}", name="showClient")
     */
    public function showClient(Request $request,$id)
    {     
        $em=$this->getDoctrine()->getManager();
        
        $client = $em->getRepository("AppBundle:Client")->find($id);
        
        return $this->render('@App/Client/showClient.html.twig',array('client'=>$client));    
    }
    
    /**
     * @Route("/listClients", name="listClients")
     */
    public function listClients(Request $request)
    {     
        $em=$this->getDoctrine()->getManager();
        $clients = $em->getRepository("AppBundle:Client")->findAll();
           
        return $this->render('@App/Client/listClients.html.twig',array('clients'=>$clients));    
    }
    
    
////////////////////////////////////////////////// Fournisseurs /////////////////////////////////////////////////
    
    /**
     * @Route("/creerModifierFournisseur/{id}", name="creerModifierFournisseur")
     */
    public function creerModifierFournisseur(Request $request,$id=null)
    {     
        $em=$this->getDoctrine()->getManager();
        
        if($id)
            {
                $fourisseur = $em->getRepository("AppBundle:Fournisseur")->find($id);
                
                if($fourisseur)
                    {
                        $form= $this->get('form.factory')->create(FournisseurType::class,$fourisseur);
                        
                        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) 
                            {
                                $em->persist($fourisseur);
                                $em->flush();
                                
                                $id_fourisseur = $fourisseur->getId();
                                $request->getSession()->getFlashBag()->add('info', 'Votre $fourisseur a été bien modifié');
                                return $this->redirectToRoute('showFournisseur', array('id' => $id_fourisseur));
                            }
                        return $this->render('@App/Fournisseur/editFournisseur.html.twig', array('form' => $form->createView()));    
                    }
                else
                    {
                        $request->getSession()->getFlashBag()->add('info', 'Erreur , Veuilez vérifier votre demande');
                    }
            }
        else
        {
            $fourisseur = new Fournisseur();
            $form= $this->get('form.factory')->create(FournisseurType::class,$fourisseur);
            
            if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) 
                {
                    $em->persist($fourisseur);
                    $em->flush();
                                
                    $id_fourisseur = $fourisseur->getId();
                    $request->getSession()->getFlashBag()->add('info', 'Votre fourisseur a été bien crée');
                    return $this->redirectToRoute('showFournisseur', array('id' => $id_fourisseur));
                }
            return $this->render('@App/Fournisseur/addFournisseur.html.twig', array('form' => $form->createView()));    
        }
    }
    
    /**
     * @Route("/deleteFournisseur/{id}", name="deleteFournisseur")
     */
    public function deleteFournisseur(Request $request,$id)
    {     
        $em=$this->getDoctrine()->getManager();
        $fournisseur = $em->getRepository("AppBundle:Fournisseur")->find($id);
        
        $em->remove($fournisseur);
        $em->flush();
        
        $request->getSession()->getFlashBag()->add('info', 'Votre fournisseur a été bien supprimé');
        $fournisseurs = $em->getRepository("AppBundle:Fournisseur")->findAll();
        
        return $this->render('@App/Fournisseur/listFournisseurs.html.twig',array('fournisseurs'=>$fournisseurs));    
    }
    
    /**
     * @Route("/showFournisseur/{id}", name="showFournisseur")
     */
    public function showFournisseur(Request $request,$id)
    {     
        $em=$this->getDoctrine()->getManager();
        
        $fournisseur = $em->getRepository("AppBundle:Fournisseur")->find($id);
        
        return $this->render('@App/Fournisseur/showFournisseur.html.twig',array('fournisseur'=>$fournisseur));    
    }
    
    /**
     * @Route("/listFournisseurs", name="listFournisseurs")
     */
    public function listFournisseurs(Request $request)
    {     
        $em=$this->getDoctrine()->getManager();
        $fournisseurs = $em->getRepository("AppBundle:Fournisseur")->findAll();
           
        return $this->render('@App/Fournisseur/listFournisseurs.html.twig',array('fournisseurs'=>$fournisseurs));    
    }
    
   ////////////////////////////////////////////////// Produits /////////////////////////////////////////////////
    
    /**
     * @Route("/creerModifierProduit/{id}", name="creerModifierProduit")
     */
    public function creerModifierProduit(Request $request,$id=null)
    {     
        $em=$this->getDoctrine()->getManager();
        
        if($id)
            {
                $produit = $em->getRepository("AppBundle:Produit")->find($id);
                
                if($produit)
                    {
                        $form= $this->get('form.factory')->create(ProduitType::class,$produit);
                        
                        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) 
                            {
                                $em->persist($produit);
                                $em->flush();
                                
                                $id_produit = $produit->getId();
                                $request->getSession()->getFlashBag()->add('info', 'Votre produit a été bien modifié');
                                return $this->redirectToRoute('showProduit', array('id' => $id_produit));
                            }
                        return $this->render('@App/Produit/editProduit.html.twig', array('form' => $form->createView()));    
                    }
                else
                    {
                        $request->getSession()->getFlashBag()->add('info', 'Erreur , Veuilez vérifier votre demande');
                    }
            }
        else
        {
            $produit = new Produit();
            $form= $this->get('form.factory')->create(ProduitType::class,$produit);
            
            if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) 
                {
                    $em->persist($produit);
                    $em->flush();
                                
                    $id_produit = $produit->getId();
                    $request->getSession()->getFlashBag()->add('info', 'Votre produit a été bien ajouté');
                    return $this->redirectToRoute('showProduit', array('id' => $id_produit));
                }
            return $this->render('@App/Produit/addProduit.html.twig', array('form' => $form->createView()));    
        }
    }
    
    /**
     * @Route("/deleteProduit/{id}", name="deleteProduit")
     */
    public function deleteProduit(Request $request,$id)
    {     
        $em=$this->getDoctrine()->getManager();
        $produit = $em->getRepository("AppBundle:Produit")->find($id);
        
        $em->remove($produit);
        $em->flush();
        
        $request->getSession()->getFlashBag()->add('info', 'Votre produit a été bien supprimé');
        $produits = $em->getRepository("AppBundle:Produit")->findAll();
        
        return $this->render('@App/Produit/listProduits.html.twig',array('produits'=>$produits));    
    }
    
    /**
     * @Route("/showProduit/{id}", name="showProduit")
     */
    public function showProduit(Request $request,$id)
    {     
        $em=$this->getDoctrine()->getManager();
        
        $produit = $em->getRepository("AppBundle:Produit")->find($id);
        
        $elements=$produit->getElementAchat();
        return $this->render('@App/Produit/showProduit.html.twig',array('produit'=>$produit));    
    }
    
    /**
     * @Route("/listProduits", name="listProduits")
     */
    public function listProduits(Request $request)
    {     
        $em=$this->getDoctrine()->getManager();
        $produits = $em->getRepository("AppBundle:Produit")->findAll();
           
        return $this->render('@App/Produit/listProduits.html.twig',array('produits'=>$produits));    
    }
    
    
    public function listProduitsManques()
    {     
        $em=$this->getDoctrine()->getManager();
        $produits = $em->getRepository("AppBundle:Produit")->FindProduitsManques();
           
        return $produits;    
    }
    
    
    ////////////////////////////////////////////////// Achats /////////////////////////////////////////////////
    
    /**
     * @Route("/creerModifierAchat/{id}", name="creerModifierAchat")
     */
    public function creerModifierAchat(Request $request,$id=null)
    {     
        $em=$this->getDoctrine()->getManager();
        
        if($id)
            {
                $achat = $em->getRepository("AppBundle:Achat")->find($id);
                
                if($achat)
                    {
                    
                        $elements = $achat->getElements();
                        foreach($elements as $element)
                        {
                            $id_produit = $element->getProduit()->getId();
                            $nouvelle_quantite_produit = $element->getQuantite();
                            $produit = $em->getRepository("AppBundle:Produit")->find($id_produit);
                            $quantite_produit = $produit->getQuantite();
                            $quantite_produit = $quantite_produit - $nouvelle_quantite_produit;
                            $produit->setQuantite($quantite_produit);
                            $element->setAchat($achat);
                            $em->persist($produit);
                            $em->persist($element);
                        }
                        $form= $this->get('form.factory')->create(AchatType::class,$achat);
                        
                        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) 
                            {   
                                $today  = new \DateTime('now');
                                $achat->setModifieLe($today);
                                $elements = $achat->getElements();
                                $total=0;
                                foreach($elements as $element)
                                {
                                    $id_produit = $element->getProduit()->getId();
                                    $nouvelle_quantite_produit = $element->getQuantite();
                                    $produit = $em->getRepository("AppBundle:Produit")->find($id_produit);
                                    $quantite_produit = $produit->getQuantite();
                                    $quantite_produit = $quantite_produit + $nouvelle_quantite_produit;
                                    $produit->setQuantite($quantite_produit);
                                    $element->setAchat($achat);
                                    $em->persist($produit);
                                    $em->persist($element);
                                    $total = $total+($element->getQuantite()*$element->getPrix());
                                }
                                $achat->setTotal($total);
                                $em->persist($achat);
                                $em->flush();
                                
                                $id_achat = $achat->getId();
                                $request->getSession()->getFlashBag()->add('info', 'Votre achat a été bien modifié');
                                return $this->redirectToRoute('showAchat', array('id' => $id_achat));
                            }
                        return $this->render('@App/Achat/editAchat.html.twig', array('form' => $form->createView()));    
                    }
                else
                    {
                        $request->getSession()->getFlashBag()->add('info', 'Erreur , Veuilez vérifier votre demande');
                    }
            }
        else
        {
            $today  = new \DateTime('now');
            $achat = new Achat();
            $achat->setCreeLe($today);
            $achat->setModifieLe($today);
            $form= $this->get('form.factory')->create(AchatType::class,$achat);
            
            if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) 
                {
                    $elements = $achat->getElements();
                    $total=0;
                    foreach($elements as $element)
                    {
                        $id_produit = $element->getProduit()->getId();
                        $nouvelle_quantite_produit = $element->getQuantite();
                        $produit = $em->getRepository("AppBundle:Produit")->find($id_produit);
                        $quantite_produit = $produit->getQuantite();
                        $quantite_produit = $quantite_produit + $nouvelle_quantite_produit;
                        $produit->setQuantite($quantite_produit);
                        $element->setAchat($achat);
                        $em->persist($produit);
                        $em->persist($element);
                        $total = $total+($element->getQuantite()*$element->getPrix());
                    }
                    $achat->setTotal($total);
                    $em->persist($achat);
                    $em->flush();
                                
                    $id_achat = $achat->getId();
                    $request->getSession()->getFlashBag()->add('info', 'Votre achat a été bien ajouté');
                    return $this->redirectToRoute('showAchat', array('id' => $id_achat));
                }
            return $this->render('@App/Achat/addAchat.html.twig', array('form' => $form->createView()));    
        }
    }
    
    /**
     * @Route("/deleteAchat/{id}", name="deleteAchat")
     */
    public function deleteAchat(Request $request,$id)
    {     
        $em=$this->getDoctrine()->getManager();
        $achat = $em->getRepository("AppBundle:Achat")->find($id);
        
        $elements = $achat->getElements();
        foreach($elements as $element)
            {
                $id_produit = $element->getProduit()->getId();
                $nouvelle_quantite_produit = $element->getQuantite();
                $produit = $em->getRepository("AppBundle:Produit")->find($id_produit);
                $quantite_produit = $produit->getQuantite();
                $quantite_produit = $quantite_produit - $nouvelle_quantite_produit;
                $produit->setQuantite($quantite_produit);
                $element->setAchat($achat);
                $em->persist($produit);
                $em->remove($element);
            }
        
        $em->remove($achat);
        $em->flush();
        
        $request->getSession()->getFlashBag()->add('info', 'Votre achat a été bien supprimé');
        $achats = $em->getRepository("AppBundle:Achat")->findAll();
        
        return $this->render('@App/Achat/listAchats.html.twig',array('achats'=>$achats));    
    }
    
    /**
     * @Route("/showAchat/{id}", name="showAchat")
     */
    public function showAchat(Request $request,$id)
    {     
        $em=$this->getDoctrine()->getManager();
        
        $achat = $em->getRepository("AppBundle:Achat")->find($id);
  
        return $this->render('@App/Achat/showAchat.html.twig',array('achat'=>$achat));    
    }
    
    /**
     * @Route("/listAchats", name="listAchats")
     */
    public function listAchats(Request $request)
    {     
        $em=$this->getDoctrine()->getManager();
        $achats = $em->getRepository("AppBundle:Achat")->findAll();
           
        return $this->render('@App/Achat/listAchats.html.twig',array('achats'=>$achats));    
    }
    
    
    
    ////////////////////////////////////////////////// Ventes /////////////////////////////////////////////////
    
    /**
     * @Route("/creerModifierVente/{id}", name="creerModifierVente")
     */
    public function creerModifierVente(Request $request,$id=null)
    {     
        $em=$this->getDoctrine()->getManager();
        
        if($id)
            {
                $vente = $em->getRepository("AppBundle:Vente")->find($id);
                
                if($vente)
                    {
                        $elements = $vente->getElements();
                        foreach($elements as $element)
                        {
                            $id_produit = $element->getProduit()->getId();
                            $nouvelle_quantite_produit = $element->getQuantite();
                            $produit = $em->getRepository("AppBundle:Produit")->find($id_produit);
                            $quantite_produit = $produit->getQuantite();
                            $quantite_produit = $quantite_produit + $nouvelle_quantite_produit;
                            $produit->setQuantite($quantite_produit);
                            $element->setVente($vente);
                            $em->persist($produit);
                            $em->persist($element);
                        }
                        $form= $this->get('form.factory')->create(VenteType::class,$vente);
                        
                        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) 
                            {   
                                $today  = new \DateTime('now');
                                $vente->setModifieLe($today);
                                $elements = $vente->getElements();
                                $total=0;
                                foreach($elements as $element)
                                {
                                    $id_produit = $element->getProduit()->getId();
                                    $nouvelle_quantite_produit = $element->getQuantite();
                                    $produit = $em->getRepository("AppBundle:Produit")->find($id_produit);
                                    $quantite_produit = $produit->getQuantite();
                            
                                    if($nouvelle_quantite_produit>$quantite_produit)
                                        {
                                            $valide=false;
                                            $request->getSession()->getFlashBag()->add('warning', "Vous n'avez pas la quantié demandée en stock : ".$produit->getLibelle()." : ".$produit->getReference());
                                            return $this->render('@App/Vente/addVente.html.twig', array('form' => $form->createView())); 

                                        }
                                    if($valide==true)
                                        {
                                            $quantite_produit = $quantite_produit - $nouvelle_quantite_produit;
                                            $produit->setQuantite($quantite_produit);
                                            $element->setVente($vente);
                                            $element->setPrix($prix);
                                            $em->persist($produit);
                                            $em->persist($element);
                                            $total = $total+($element->getQuantite()*$element->getPrix());
                                        }
                                }
                                $vente->setTotal($total);
                                $em->persist($vente);
                                $em->flush();
                                
                                $id_vente = $vente->getId();
                                $request->getSession()->getFlashBag()->add('info', 'Votre vente a été bien modifiée');
                                return $this->redirectToRoute('showVente', array('id' => $id_vente));
                            }
                        return $this->render('@App/Vente/editVente.html.twig', array('form' => $form->createView()));    
                    }
                else
                    {
                        $request->getSession()->getFlashBag()->add('info', 'Erreur , Veuilez vérifier votre demande');
                    }
            }
        else
        {
            $today  = new \DateTime('now');
            $vente = new Vente();
            $vente->setCreeLe($today);
            $vente->setModifieLe($today);
            $form= $this->get('form.factory')->create(VenteType::class,$vente);
            
            
            if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) 
                {
                    $elements = $vente->getElements();
                    $total=0;
                    $valide =true;
                    foreach($elements as $element)
                    {
                        $id_produit = $element->getProduit()->getId();
                        $nouvelle_quantite_produit = $element->getQuantite();
                        $produit = $em->getRepository("AppBundle:Produit")->find($id_produit);
                        $prix=$produit->getPrixVente();
                        $quantite_produit = $produit->getQuantite();
                        if($nouvelle_quantite_produit>$quantite_produit)
                        {
                            $valide=false;
                            $request->getSession()->getFlashBag()->add('warning', "Vous n'avez pas la quantié demandée en stock : ".$produit->getLibelle()." : ".$produit->getReference());
                            return $this->render('@App/Vente/addVente.html.twig', array('form' => $form->createView())); 

                        }
                        if($valide==true)
                        {
                            $quantite_produit = $quantite_produit - $nouvelle_quantite_produit;
                            $produit->setQuantite($quantite_produit);
                            $element->setVente($vente);
                            $element->setPrix($prix);
                            $em->persist($produit);
                            $em->persist($element);
                            $total = $total+($element->getQuantite()*$element->getPrix());
                        }
                    }
                    $vente->setTotal($total);
                    $em->persist($vente);
                    $em->flush();
                                
                    $id_vente = $vente->getId();
                    $request->getSession()->getFlashBag()->add('info', 'Votre vente a été bien ajoutée');
                    return $this->redirectToRoute('showVente', array('id' => $id_vente));
                }
            return $this->render('@App/Vente/addVente.html.twig', array('form' => $form->createView()));    
        }
    }
    
    /**
     * @Route("/deleteVente/{id}", name="deleteVente")
     */
    public function deleteVente(Request $request,$id)
    {     
        $em=$this->getDoctrine()->getManager();
        $vente = $em->getRepository("AppBundle:Vente")->find($id);
        
        $elements = $vente->getElements();
        foreach($elements as $element)
            {
                $id_produit = $element->getProduit()->getId();
                $nouvelle_quantite_produit = $element->getQuantite();
                $produit = $em->getRepository("AppBundle:Produit")->find($id_produit);
                $quantite_produit = $produit->getQuantite();
                $quantite_produit = $quantite_produit + $nouvelle_quantite_produit;
                $produit->setQuantite($quantite_produit);
                $element->setVente($vente);
                $em->persist($produit);
                $em->remove($element);
                        }
        
        $em->remove($vente);
        $em->flush();
        
        $request->getSession()->getFlashBag()->add('info', 'Votre vente a été bien supprimée');
        $ventes = $em->getRepository("AppBundle:Vente")->findAll();
        
        return $this->render('@App/Vente/listVentes.html.twig',array('ventes'=>$ventes));    
    }
    
    /**
     * @Route("/showVente/{id}", name="showVente")
     */
    public function showVente(Request $request,$id)
    {     
        $em=$this->getDoctrine()->getManager();
        
        $vente = $em->getRepository("AppBundle:Vente")->find($id);
        
        return $this->render('@App/Vente/showVente.html.twig',array('vente'=>$vente));    
    }
    
    /**
     * @Route("/listVentes", name="listVentes")
     */
    public function listVentes(Request $request)
    {     
        $em=$this->getDoctrine()->getManager();
        $ventes = $em->getRepository("AppBundle:Vente")->findAll();
           
        return $this->render('@App/Vente/listVentes.html.twig',array('ventes'=>$ventes));    
    }
    
    /**
     * @Route("/listVentesPayes", name="listVentesPayes")
     */
    public function listVentesPayes(Request $request)
    {     
        $em=$this->getDoctrine()->getManager();
        $ventes = $em->getRepository("AppBundle:Vente")->findBy(array('paye'=>true));
           
        return $this->render('@App/Vente/listVentes.html.twig',array('ventes'=>$ventes));    
    }
    
    /**
     * @Route("/listVentesImpayes", name="listVentesImpayes")
     */
    public function listVentesImpayes(Request $request)
    {     
        $em=$this->getDoctrine()->getManager();
        $ventes = $em->getRepository("AppBundle:Vente")->findBy(array('paye'=>false));
           
        return $this->render('@App/Vente/listVentes.html.twig',array('ventes'=>$ventes));    
    }
    
    public function listFacturesImpayes()
    {     
        $em=$this->getDoctrine()->getManager();
        $ventes = $em->getRepository("AppBundle:Vente")->findBy(array('paye'=>false));
           
        return $ventes;    
    }
    
    /**
     * @Route("/PayerVente/{id}", name="PayerVente")
     */
    public function PayerVente(Request $request,$id)
    {     
        $em=$this->getDoctrine()->getManager();
        
        $vente = $em->getRepository("AppBundle:Vente")->find($id);
        $vente->setPaye(true);
        
        $em->persist($vente);
        $em->flush();
        
        return $this->render('@App/Vente/showVente.html.twig',array('vente'=>$vente));    
    }
    
    /**
     * @Route("/DownloadBL/{id}", name="DownloadBL")
     */
    public function DownloadBL(Request $request,$id)
    {     
        $em=$this->getDoctrine()->getManager();
        
        $vente = $em->getRepository("AppBundle:Vente")->find($id);
        $elements = $vente->getElements();
        $today  = new \DateTime('now');
        
        $TBS = $this->container->get('opentbs');
        
        $TBS->LoadTemplate($this->getTmpUploadRootDir().'template/BL.docx',OPENTBS_ALREADY_UTF8);
        
        $TBS->MergeField('vente',array(
              'date' => $today->format(('d/m/Y')) ,
              'client' => $vente->getClient()->getSociete(),
              'adresse'=> $vente->getClient()->getAdresse(),
              'num'=>$vente->getId().'-'.$today->format('Y'),
              'code'=>$vente->getClient()->getCode(),
              'total'=>$vente->getTotal()
              ));
        $data = array();
          foreach ($elements as $element)
          {
            $data[] = array('designation' => $element->getProduit()->getLibelle().' : '.$element->getProduit()->getReference(),
                            'qty' => $element->getQuantite(),
                            'prix' => $element->getPrix(),
                            'total' => $element->getQuantite()*$element->getPrix(),
                );
          }
        
        $TBS->MergeBlock('a', $data);
        
        $name="BL_".$vente->getClient()->getSociete()."_V".$vente->getId();
        $TBS->Show(OPENTBS_DOWNLOAD,$name.'.doc');
        //$TBS->Show(OPENTBS_FILE, $this->getUploadRootDir().$name.'.doc');
        return $this->render('@App/Vente/showVente.html.twig',array('vente'=>$vente));    
    }
    
    
     //Upload file path
    protected function getUploadRootDir() 
    {
    // the absolute directory path where uploaded documents should be saved
    return $this->getTmpUploadRootDir().'/BL/';
    }
    
    protected function getTmpUploadRootDir()
    {
    // the absolute directory path where uploaded documents should be saved
    return __DIR__ . '/../../../web/upload/';
    }
    
    }
