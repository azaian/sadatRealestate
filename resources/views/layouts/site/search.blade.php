<!-- Search -->
<section class="property-query-area padding_bottom rtl">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="uppercase">بحث متقدم</h2>
                <p class="heading_space"></p>
            </div>
        </div>
        <div class="row">
            <form class="callus" action="{{route('listing')}}" method="post">
                @csrf
                <div class="col-md-2 col-sm-3 pull-right">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="single-query form-group">
                                رقم العقار
                                <input type="number" name="id" min="0" class="keyword-input" placeholder="رقم العقار">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 pull-right">
                    <div class="single-query form-group">
                        <div class="intro">
                            الفئه
                            <select name="cat_id" class="cat_id">
                                <option value="">غير محدد</option>
                                @if (isset($Dataa['categories'])&&count($Dataa['categories'])>0)
                                @foreach ($Dataa['categories'] as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 pull-right">
                    <div class="single-query form-group">
                        المنطقه
                        <select name="district" class="district">
                            <option value="">غير محدد</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 pull-right">
                    <div class="single-query form-group">
                        <div class="intro">
                            النوع
                            <select name="type">
                                <option class="active" value="sale">بيع</option>
                                <option value="rent">اجار</option>
                            </select>
                        </div>
                    </div>
                </div>


                {{-- <div class="col-md-12">
                    <div class="row"> --}}

                <div class="col-md-2 col-sm-3 pull-right">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="single-query form-group">
                                مساحه
                                <input type="number" name="area[1]" min="0" class="keyword-input" placeholder=" مساحه">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-3 pull-right">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="single-query form-group">
                                سعر
                                <input type="number" name="price[1]" min="0" class="keyword-input" placeholder=" سعر">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-offset-4 col-md-4 text-right form-group">
                    <button type="submit" class="btn-blue border_radius">بحث</button>
                    {{-- </div>
                    </div> --}}
                </div>
            </form>
        </div>

    </div>
</section>
<!-- Search End -->