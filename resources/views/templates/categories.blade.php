<div class='brochure-categories'>
    @foreach($categories as $category)
      <div class='brochure-category' data-id='{{ $category->term_id }}'>
          <div class='brochure-category-image' style='background-image:url("{{$category->image}}")' id="s_{{ $category->term_id }}"></div>
        <div class='brochure-category-details'>
              <h2>{{$category->name}}</h2>
           <?php  $category->image; ?>
          </div>
        </div>  
        @endforeach
</div>