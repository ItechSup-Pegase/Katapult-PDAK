<?php
namespace Sofitech\AdminBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PersonRepository extends EntityRepository{
	
	public function findWithAdresses($id){
		return $this->getEntityManager()
			->createQuery(
				'SELECT a, p FROM SofitechAdminBundle:Person p JOIN p.adresses a WHERE p.id = :id'
			)
		->setParameter('id', $id)
		->getSingleResult();
	}
}