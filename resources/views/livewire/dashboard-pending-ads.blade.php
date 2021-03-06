@extends('livewire.layouts.dashboard')
@section('data')
    <h3 class="widget-header">Pending Ads</h3>
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

            <form id="approve-{{ $ad['id'] }}" action="{{ url('ad/' . $ad['id']) }}" method="POST">
                @csrf
                @method('PUT')
            </form>
            <form id="delete-{{ $ad['id'] }}" action="{{ url('ad/' . $ad['id']) }}" method="POST">
                @csrf
                @method('DELETE')
            </form>
                <tr>

                    <td class="product-thumb">
                        <img width="80px" height="auto" src={{ asset('images/' . $ad['images']) }}
                            alt="image description">
                    </td>
                    <td class="product-details">
                        <h3 class="title">{{ $ad['title'] }}</h3>
                        <span class="add-id"><strong>Ad ID:</strong> {{ $ad['id'] }}</span>
                        <span><strong>Posted on: </strong><time>{{ $ad['created_at'] }}</time> </span>
                        <span class="status active"><strong>Status</strong>{{ $ad['status'] ? 'Active':'Pending' }}</span>
                        <span class="location"><strong>Location</strong>{{ $ad['location'] }}</span>
                    </td>
                    <td class="product-category"><span
                            class="categories">{{ App\Models\Category::find($ad['category_id'])['name'] }}</span></td>
                    <td class="action" data-title="Action">
                        <div class="">
                            <ul class="list-inline justify-content-center">
                                <li class="list-inline-item">
                                    <a data-toggle="tooltip" data-placement="top" title="view" class="view"
                                        href="{{ url('ad/' . $ad['id']) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="edit" data-toggle="tooltip" data-placement="top" title="Approve"
                                        onclick="document.getElementById('approve-{{ $ad['id'] }}').submit()">
                                        <i class="fa fa-check-circle"></i>
                                    </a>
                                </li>
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
