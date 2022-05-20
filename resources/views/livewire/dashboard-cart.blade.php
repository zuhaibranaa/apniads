@extends('livewire.layouts.dashboard')
@section('data')
    <h3 class="widget-header">My Cart</h3>
    <table class="table table-responsive product-dashboard-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product Title</th>
                <th class="text-center">Category</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ads as $ad)
            @php $i = App\Models\Ad::find($ad['item_id']) @endphp
                <tr>
                    @php
                        $arr = trim($i['images'], '[');
                        $arr = trim($arr, ']');
                        $r = explode(',', $arr);
                    @endphp
                    <td class="product-thumb">
                        <img width="80px" height="auto" src={{ asset('images/' . Str::substr($r[0], 1, -1)) }} alt="image description">
                    </td>
                    <td class="product-details">
                        <h3 class="title">{{ $i['title'] }}</h3>
                        <span class="add-id"><strong>Ad ID:</strong> {{ $i['id'] }}</span>
                        <span><strong>Posted on: </strong><time>{{ $i['created_at'] }}</time> </span>
                        <span class="location"><strong>Location</strong>{{ $i['location'] }}</span>
                    </td>
                    <td class="product-category"><span
                            class="categories">{{ App\Models\Category::find($i['category_id'])['name'] }}</span></td>
                    <td class="action" data-title="Action">
                        <div class="">
                            <ul class="list-inline justify-content-center">
                                <li class="list-inline-item">
                                    <a class="edit" data-toggle="tooltip" data-placement="top" title="Place Order"
                                        href="">
                                        <i class="fa fa-check-circle"></i>
                                    </a>
                                </li>
                                <form id="delete-{{ $ad['id'] }}" action="{{ url('cart/' . $ad['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <li class="list-inline-item">
                                    <a class="delete"
                                        onclick="document.getElementById('delete-{{ $ad['id'] }}').submit()"
                                        data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
