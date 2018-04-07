<?php 

namespace App\Http\Controllers\Front;

use App\Shop\Products\Product;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Shop\Products\Transformations\ProductTransformable;

use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;

class ProductController extends Controller
{
    use ProductTransformable;

    /**
     * @var ProductRepositoryInterface
     * @var CategoryRepositoryInterface
     */
    private $productRepo;

    private $categoryRepo;

    /**
     * ProductController constructor.
     * @param ProductRepositoryInterface $productRepository
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository,CategoryRepositoryInterface $categoryRepository)
    {
        $this->productRepo = $productRepository;
        $this->categoryRepo = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        $list = $this->productRepo->searchProduct(request()->input('q'));

        $products = $list->map(function (Product $item) {
            return $this->transformProduct($item);
        })->all();

        return view('front.products.product-search', [
            'products' => $this->productRepo->paginateArrayResults($products, 10)
        ]);
    }

    /**
     * Get the product
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $slug)
    {
        $product = $this->productRepo->findProductBySlug(['slug' => $slug]);
        $images = $product->images()->get();
        $productAttributes = $product->attributes()->get();

        $category2 = $this->categoryRepo->findCategoryById(2);
        $category3 = $this->categoryRepo->findCategoryById(3);

        $newests = $category2->products;
        $features = $category3->products;

        return view('front.products.product', compact('product', 'images', 'productAttributes','newests', 'features', 'category2', 'category3')); 
    }
}
