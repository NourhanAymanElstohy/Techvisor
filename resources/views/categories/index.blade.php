<div class="col-lg-3 col-md-4 pd-left-none no-pd">
    <div class="main-left-sidebar no-margin">
        <div class="suggestions full-width">
            <div class="sd-title">
                <h3>CATEGORIES</h3>
            </div>
            <div class="suggestions-list">
                @foreach ($categories as $category)
                    <div class="suggestion-usd">
                        <div class="sgt-text">
                            <div class="post-st">
                                <ul>
                                    <li>
                                    @hasanyrole('super-admin|user|professional')
                                        <a href="{{route('categories.show',['category' => $category->id])}}">
                                            {{$category->name}}</a>
                                    @else
                                        <a href="/">{{$category->name}}</a>
                                    @endhasanyrole

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
