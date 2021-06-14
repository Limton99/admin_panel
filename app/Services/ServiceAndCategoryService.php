<?php


namespace App\Services;



use Illuminate\Http\Request;

interface ServiceAndCategoryService
{
    public function createCategory(Request $request);
    public function editCategory(Request $request, $id);
    public function getAllCategory();
    public function getAllCategoryPaginate();
    public function getCategory($id);

    public function createService(Request $request);
    public function editService(Request $request, $id);
    public function getAllService();
    public function getAllServicePaginate();
    public function getService($id);

    public function createAlias(Request $request);
    public function editAlias(Request $request, $id);
    public function getAllAlias();
    public function getAlias($id);
    public function deleteAlias($id);

    public function createRubric(Request $request);
    public function editRubric(Request $request, $id);
    public function getAllRubricPaginate();
    public function getRubric($id);
    public function deleteRubric($id);
}
