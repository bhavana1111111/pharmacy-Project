<?php
namespace Phppot;

use Phppot\DataSource;

class CountryStateCity
{
    private $ds;
    
    function __construct()
    {
        require_once __DIR__ . './../lib/DataSource.php';
        $this->ds = new DataSource();
    }
    
    /**
     * to get the country record set
     *
     * @return array result record
     */
    public function getAllCountry()
    {
        $query = "SELECT * FROM categories";
        $result = $this->ds->select($query);
        return $result;
    }
    
    /**
     * to get the state record based on the country_id
     *
     * @param string $countryId
     * @return array result record
     */
    public function getStateByCountrId($countryId)
    {
        $query = "SELECT * FROM product_categories WHERE category =? ";
        $paramType = 'd';
        $paramArray = array(
            $countryId
        );
        $result = $this->ds->select($query, $paramType, $paramArray);
        return $result;
    }
    
    /**
     * to get the city record based on the state_id
     *
     * @param string $stateId
     * @return array result record
     */
}