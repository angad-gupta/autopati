<?php

namespace App\Modules\Cars\Repositories;

interface CarInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function findDealOfMonth($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function findMostSearched($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function findLuxury($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1]);

    public function findUpcomingCar($limit = null, $current_date);

    public function findElectricCar($limit);

    public function findPopularCar();

    public function findPopularBrand($limit);

    public function findLatestCar($limit);

    public function findBrandVehicle($limit = null,$id);

    public function searchVehicle($limit = null,$data);

    public function searchVehicleBudget($limit = null,$from, $to);

    public function searchVehicleModel($limit = null,$model_id);

    public function findSimilarCar($limit=null,$brand_id,$model_id,$variant_id,$car_id);
   
    public function findCar($brand_id,$model_id,$variant_id);
   
    public function find($id);
    
    public function getList();
    
    public function save($data);


    public function update($id,$data);

    public function delete($id);

  
    public function upload($file);


    /* ----------------------------------------------------------
    |                    Car Photo Features                      |
    ------------------------------------------------------------*/
    public function saveFeature($data);
    public function deleteFeature($id);
    public function uploadFeature($file);
    public function getPhotoFeatures($car_id);
    /* ----------------------------------------------------------
    |                    End of Car Photo Features               |
    ------------------------------------------------------------*/

    /* ----------------------------------------------------------
    |                    Car Photo Gallery                       |
    ------------------------------------------------------------*/
	public function saveGallery($data);
	public function uploadMultiImages($files, $key_name);
	public function saveGalleryImage($data);
	public function getPhotoGallery($car_id);
    public function deletegalleryImage($id);
    /* ----------------------------------------------------------
    |                    End of Car Photo Gallery               |
    ------------------------------------------------------------*/

    /* ----------------------------------------------------------
    |                    Car Specification                       |
    ------------------------------------------------------------*/
    public function getFeaturesByCarId($car_id,$spec_id,$config_id);
    public function saveCarFeatures($data);
    public function clearFeaturesById($car_id,$spec_id,$confid_id);
    /* ----------------------------------------------------------
    |                    End of Car Specification                |
    ------------------------------------------------------------*/

    /* ----------------------------------------------------------
    |                    Car Available Color                     |
    ------------------------------------------------------------*/
    public function getColorByCarId($car_id);
    public function saveAvailableColor($data);
    public function updateAvailableColor($id,$data);
    public function uploadColorCar($file);
    public function deleteColorCar($id);
    /* ----------------------------------------------------------
    |                    End of  Car Available Color             |
    ------------------------------------------------------------*/

    /* ----------------------------------------------------------
    |                         Car count                          |
    ------------------------------------------------------------*/
    public function countColor($car_id);
    public function countgallery($car_id);
    public function countspecification($car_id);
    public function countFeature($car_id);
    /* ----------------------------------------------------------
    |                       End of   Car count                   |
    ------------------------------------------------------------*/

    public function countViews($car_id);

  
    
}