<?php
namespace App\Controller;

use App\Model\Entity\Country;
use App\Model\Table\CountriesTable;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\EventInterface;

class AutocompleteController extends AppController
{
    public function index()
    {
        $this->render('autocomplete');
    }

    public function fetch()
{
    $this->autoRender = false;
    $query = $this->request->getQuery('query');
    $countriesTable = $this->getTableLocator()->get('Countries');

    $data = $countriesTable->find()
        ->where(['country_name LIKE' => '%' . $query . '%'])
        ->toArray();

    $output = '';
    if (count($data) > 0) {
        $output .= '<ul class="dropdown-menu" style="display:block; position:relative;width:100%;">';

        foreach ($data as $row) {
            $output .= '<li><a class="dropdown-item" href="#">' . $row->country_name . '</a></li>';
        }

        $output .= '</ul>';
    } else {
        $output .= '<li class="list-group-item">No Data found</li>';
    }
  
    echo $output;
}

}