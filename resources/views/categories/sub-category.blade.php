<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
    <?php $_SESSION['i']=$_SESSION['i']+1; ?>
    <tr>
        <td class="font-medium">{{$_SESSION['i']}}</td>
        <td class="font-medium">{{$dash}}{{$subcategory->name}}</td>
        <td class="font-medium">{{$subcategory->slug}}</td>
        <td class="font-medium">{{$subcategory->parent->name}}</td>
        <td>
            <a href="{{route('categories.edit', $subcategory->id)}}" class="inline-block py-1 px-2 text-white bg-blue-500 rounded-full">Edit</a>
        </td>
    </tr>
    @if(count($subcategory->subcategory))
        @include('categories.sub-category',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach