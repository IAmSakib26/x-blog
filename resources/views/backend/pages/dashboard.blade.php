@extends('backend.layout.layout')
@section('title', 'Dashboard')
@section('content')
<h1 class="text-3xl text-black pb-6">Dashboard</h1>
    
<div class="flex flex-wrap mt-6">
    <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-plus mr-3"></i> Most Category Used
        </p>
        <div class="p-6 bg-white">
            <canvas id="chartOne" width="400" height="200"></canvas>
        </div>
    </div>
    <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-check mr-3"></i> Most Blogs By Authors
        </p>
        <div class="p-6 bg-white">
            <canvas id="chartTwo" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<div class="w-full mt-12">
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Latest Blog
    </p>
    <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-auto text-center py-3 px-4 uppercase font-semibold text-sm">SL</th>
                    <th class="w-auto text-center py-3 px-4 uppercase font-semibold text-sm">Title</th>
                    <th class="w-auto text-center py-3 px-4 uppercase font-semibold text-sm">Author</th>
                    <th class="w-auto text-center py-3 px-4 uppercase font-semibold text-sm">Category</th>
                    <th class="w-auto text-center py-3 px-4 uppercase font-semibold text-sm">Created</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Status</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($blogs as $blog)
                <tr>
                    <td class="w-auto text-center py-3 px-4">{{$blog->id}}</td>
                    <td class="w-auto text-center py-3 px-4">{{$blog->title}}</td>
                    <td class="w-auto text-center py-3 px-4">{{$blog->user->name}}</td>
                    <td class="w-auto text-center py-3 px-4">{{$blog->category->name}}</td>
                    <td class="w-auto text-center py-3 px-4">{{date('d m, y',strtotime($blog->created_at))}}</td>
                    <td class="text-center py-3 px-4">
                        @if ($blog->status == 1)
                            <p class="text-green-500 bg-green-100 px-3 py-1 rounded-full text-center">Active</p>
                        @endif
                    </td>
                    <td class="text-center py-3 px-4 flex items-center justify-center">
                        <a class="hover:text-blue-500 mx-2" href="{{route('blogs.edit', $blog->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE') <!-- This tells Laravel to treat the request as a DELETE -->
                            <button type="submit" class="hover:text-blue-500 mx-2" onclick="return confirm('Are you sure you want to delete this blog?');">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var chartOne = document.getElementById('chartOne');
    var categoryNames = @json($categories->pluck('name'));
    var categoryCounts = @json($categories->pluck('blogs_count'));
    var myChart = new Chart(chartOne, {
        type: 'bar',
        data: {
            labels: categoryNames,
            datasets: [{
                label: 'Categories',
                data: categoryCounts,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var chartTwo = document.getElementById('chartTwo');
    var authorsName = @json($authors->pluck('name'));
    var authorsCounts = @json($authors->pluck('blogs_count'));
    var myLineChart = new Chart(chartTwo, {
        type: 'line',
        data: {
            labels: authorsName,
            datasets: [{
                label: 'Authors',
                data: authorsCounts,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endsection