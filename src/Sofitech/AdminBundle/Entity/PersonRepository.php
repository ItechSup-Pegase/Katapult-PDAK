<?php
namespace Sofitech\AdminBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PersonRepository extends EntityRepository{
	
	public function findWithAdresses($id){
		return $this->getEntityManager()
			->createQuery(
				'SELECT p, a FROM SofitechAdminBundle:Person p, SofitechAdminBundle:Adress a 
				 WHERE p.id = :id'
			)
		->setParameter('id', $id)
		->getArrayResult();
	}
}