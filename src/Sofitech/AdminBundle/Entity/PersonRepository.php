<?php
namespace Sofitech\AdminBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PersonRepository extends EntityRepository{
	
	public function findWithAdresses($id){
		return $this->getEntityManager()
			->createQuery(
				'SELECT p FROM SofitechAdminBundle:Person p  
				 INDEX BY p.id
				 JOIN p.adress
				 WHERE p.id = :id'
			)
		->setParameter('id', $id)
		->getResult();
	}
}