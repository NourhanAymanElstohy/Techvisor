<div class="col-lg-3 col-md-4 pd-left-none no-pd">
    <div class="main-left-sidebar no-margin">
        <div class="suggestions full-width">
            <div class="sd-title">
                <h3>CATEGORIES</h3>
            </div>
            <div class="suggestions-list p-0">
                @foreach ($categories->sortBy('name') as $category)
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                @if($category->profs)
                                    <?php $count=0 ; ?>
                                    @foreach($category->profs as $prof)
                                        <?php  $count = $count+1 ?>
                                    @endforeach
                                @endif
                            @hasanyrole('super-admin|user|professional')
                                <a href="{{route('categories.show',['category' => $category->id])}}" style="color: #e44d3a">
                                    {{$category->name}}</a>
    
                                <span class="badge badge-pill text-light" style="background-color: #e44d3a"><?php echo $count ?></span>
                            @else
                                <a href="/" style="color: #e44d3a">{{$category->name}}</a>
                                <span class="badge badge-pill text-light"  style="background-color: #e44d3a"><?php echo $count ?></span>
                            @endhasanyrole
                        </li>
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
</div>