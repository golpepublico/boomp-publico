<?php

namespace App\Http\Controllers;

use App\Enums\StatusOrderType;
use App\Enums\StatusType;
use App\Repositories\PostbackRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class IntegrationsController extends Controller
{
    protected $postbackRepository;
    protected $productRepository;

    public function __construct(
        PostbackRepository  $postbackRepository,
        ProductRepository $productRepository
    ) {
        $this->postbackRepository = $postbackRepository;
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $filters = [];
        if ($request->has('search') && !empty($request->get('search'))) {
            $filters = [
                'code' => $request->get('search')
            ];
        }

        $eventsAvailable = StatusOrderType::asSelectArray();

        $postbacks = $this->postbackRepository->getAllByStore($filters);
        $postbacks = $postbacks->map(function($postback) use ($eventsAvailable) {
            if (is_null($postback->events)) {
                return $postback;
            }
            $eventValue = array_keys($postback->events);
            $eventsSelected = array_filter($eventsAvailable, function($ev) use ($eventValue) {
                if (in_array($ev, $eventValue)) return $ev;
            }, ARRAY_FILTER_USE_KEY);

            $postback['eventsalias'] = implode(', ', array_values($eventsSelected));
            return $postback;
        });

        $products = $this->productRepository->getAllByStore();
        return view('pages.integrations.index', compact(['postbacks', 'products', 'eventsAvailable']));
    }

    public function edit($id)
    {
        return $this->postbackRepository->findById($id);
    }

    public function store(Request $request, int $id = 0)
    {
//        $validator = Validator::make($request->all(), [
//            'product_id' => 'integer|exists:products,id',
//            'code' => 'required|string|min:5|max:50',
//            'callbackurl' => 'string|min:2|max:255',
//            'methodtype' => 'required|string',
//        ]);

//        if ($validator->fails()) {
//            return redirect()
//                ->route('integrations.index')
//                ->withErrors($validator)
//                ->withInput();
//        }

        $data = $request->all();
        $data['active'] = isset($data['active']) ? StatusType::ATIVO : StatusType::INATIVO;

        if ($id) {
            $this->postbackRepository->update($data, $id);
        } else {
            $data['code'] = Str::random(10);
            $data['store_id'] = Auth::user()->store->id;
            $this->postbackRepository->create($data);
        }

        return redirect()
            ->route('integrations.index')
            ->withSuccess('Postback salvo com sucesso');
    }

    public function destroy($id)
    {
        $this->postbackRepository->delete($id);

        return redirect()
            ->route('integrations.index')
            ->withSuccess('Postback deletado com sucesso');
    }

}
