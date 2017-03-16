<?php

namespace Alsciende\DoctrineSerializerBundle\Manager;

/**
 *
 * @author Alsciende <alsciende@icloud.com>
 */
interface ObjectManagerInterface
{

    /**
     * Returns a list of all classes
     * 
     * @return string[]
     */
    function getAllManagedClassNames ();

    /**
     * Returns an array of foreign key => foreign entity class 
     * for all classes that this class depends on
     * 
     * @param string $className
     * @return string[]
     */
    function getAllTargetClasses ($className);

    /**
     * Returns the single identifier of a class. Throws an exception if the class
     * using a composite key
     * 
     * @param string $className
     */
    function getSingleIdentifier ($className);

    /**
     * Commits all modifications made to managed entities
     */
    function flush ();

    /**
     * Updates some fields in the entity
     * 
     * @param object $entity
     * @param array $update
     */
    function updateObject ($entity, $update);

    /**
     * Returns the value of a field of the entity
     * 
     * @param object $entity
     * @param string $field
     */
    function readObject ($entity, $field);

    /**
     * Find the entity referenced by the identifiers in $data
     * 
     * @param string $className
     * @param array $identifiers
     * @return object
     */
    function findObject ($className, $identifiers);

    /**
     * Returns the array of identifier keys/values that can be used with find()
     * to find the entity described by $incoming
     * 
     * If an identifier is a foreignIdentifier, find the foreign entity
     * 
     * @return array
     */
    function getIdentifierValues ($className, $data);

    /**
     * Finds all the foreign keys in $data and the entity associated
     * 
     * eg ["article_id" => 2134] returns 
     * array([ "associationKey" => "article", "associationValue" => (object Article), "referenceKeys" => [ "article_id"] ])
     * 
     * @return array
     */
    function findAssociations ($className, $data);
}