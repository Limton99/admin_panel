<?php

namespace App\Http\Controllers\Promotion;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebBaseController;
use App\Services\PromotionService;
use Illuminate\Http\Request;

class PromotionController extends WebBaseController
{
    protected $promotionService;

    public function __construct(PromotionService $promotionService)
    {
        $this->promotionService = $promotionService;
    }

    public function index()
    {
        $promotions = $this->promotionService->getAll();

        return view('admin.promotion.promotions', ['promotions' => $promotions]);
    }

    public function create()
    {
        return view('admin.promotion.promotion-create');
    }

    public function store(Request $request)
    {
        $this->promotionService->store($request);

        $this->added();

        return redirect()->route('promotions');
    }

    public function edit($id)
    {
        $promotion = $this->promotionService->get($id);

        return view('admin.promotion.promotion-edit', ['promotion' => $promotion]);
    }

    public function update(Request $request, $id)
    {
        $this->promotionService->update($request, $id);

        $this->edited();

        return redirect()->route('promotions');
    }

    public function destroy($id)
    {
        $this->promotionService->delete($id);

        $this->deleted();

        return redirect()->route('promotions');
    }
}
