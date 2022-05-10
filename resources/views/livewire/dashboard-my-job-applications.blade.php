@extends('livewire.layouts.dashboard')
@section('data')
    <h3 class="widget-header">My Job Applications</h3>
    <table class="table table-responsive product-dashboard-table">
        <thead>
            <tr>
                <th>Applicant Name</th>
                <th class="text-center">Applicant Age</th>
                <th class="text-center">Applicant Contact</th>
                <th class="text-center">Applicant Experience</th>
                <th class="text-center">Applicant Availability</th>
            </tr>
        </thead>
        <tbody>
            @if ($item)
                @foreach ($item as $wish)
                    @php
                        $ad = \App\Models\Ad::find($wish->item_id);
                    @endphp
                    <td class="product-category"><span class="categories ">{{ $ad['title'] }}</span></td>
                    <td class="product-category"><span class="categories">{{ $ad['price'] }}</span></td>
                    <td class="action" data-title="Action">
                        <div class="">
                            <ul class="list-inline justify-content-center">
                                <form id="delete-{{ $wish->id }}" action="{{ url('wishlist/' . $wish->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <li class="list-inline-item">
                                    <a class="delete"
                                        onclick="document.getElementById('delete-{{ $wish->id }}').submit()"
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
