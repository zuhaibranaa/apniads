@extends('livewire.layouts.dashboard')
@section('data')
    <h3 class="widget-header">My WishList</h3>
    <table class="table table-responsive product-dashboard-table">
        <thead>
            <tr>
                <th>Item Name</th>
                <th class="text-center">Item Price</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($item)
                @foreach ($item as $wish)
                    <td class="product-category"><span class="categories ">{{ $ad['name'] }}</span></td>
                    <td class="product-category"><span class="categories">{{ $ad['price'] }}</span></td>
                    <td class="action" data-title="Action">
                        <div class="">
                            <ul class="list-inline justify-content-center">
                                <li class="list-inline-item">
                                    <a data-toggle="tooltip" data-placement="top" title="view" class="view"
                                        href="{{ url('ad/' . 'null_1') }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="edit" data-toggle="tooltip" data-placement="top" title="Edit"
                                        href="">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </li>
                                <form id="delete-null_1" action="{{ url('ad/' . 'null_1') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <li class="list-inline-item">
                                    <a class="delete" onclick="document.getElementById('delete-null_1').submit()"
                                        data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
