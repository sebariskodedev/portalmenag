<!-- resources/views/dashboard.blade.php -->
@extends('template.user')

@section('style')
<style>
/* Article Styles */
.article-title {
  font-size: 2rem;
  font-weight: bold;
  margin-bottom: 10px;
}

.article-meta {
  font-size: 0.9rem;
  color: #666;
  margin-bottom: 18px;
}

/* Image and Figure Styling */
.image-square {
  position: relative;
  padding-bottom: 40%;
  border-radius: 8px;
  overflow: hidden;
  display: flex;
  justify-content: center;
  align-items: center;
}

.image-square img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 90%;
  object-fit: cover;
}

.image-note {
  position: absolute;
  text-align: center;
  font-size: 0.8rem;
  color: #555;
  bottom: 0;
}

/* Specific Positions */
.top-right-image {
  float: right;
  margin-left: 20px;
  width: 50%;
}

.center-left-image {
  float: left;
  margin-right: 20px;
  width: 40%;
}

/* Article Content */
.article-description {
  text-align: justify;
  margin-bottom: 15px;
  font-size: 1.2rem;
}

/* Clearfix for Float */
.article-content::after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive Design */
@media (max-width: 768px) {
  .image-square {
    width: 100%;
    padding-bottom: 100%;
  }

  .top-right-image,
  .center-left-image {
    float: none;
    margin: 0 auto 20px;
  }
}
</style>
@endsection

@section('content')
<main class="main dinamyc-color">
  <!-- Portfolio Section -->
  <section id="portfolio" class="portfolio section dinamyc-color">
    <div class="container">
      <div class="article">
        <h1 class="article-title text-dinamyc-color-primary">Breaking News: Major Development in Tech</h1>
        <p class="article-meta text-dinamyc-color">By Jane Doe | Published on November 24, 2024</p>

        <div class="article-content">
          <!-- First Image (Top Right) -->
          <figure class="image-square top-right-image">
            <img src="https://images.unsplash.com/photo-1596265371388-43edbaadab94?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=501" alt="Top Right Image">
            <p class="image-note text-dinamyc-color">Figure 1: Example of the first image note</p>
          </figure>

          <p class="article-description text-dinamyc-color">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
          </p>

          <!-- Second Image (Center Left) -->
          <figure class="image-square center-left-image">
            <img src="https://images.unsplash.com/photo-1596265371388-43edbaadab94?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=501" alt="Center Left Image">
            <p class="image-note text-dinamyc-color">Figure 2: Example of the second image note</p>
          </figure>

          <p class="article-description text-dinamyc-color">
            Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Ut convallis 
            euismod dolor nec pretium. Nam sodales mi vitae dolor ullamcorper et vulputate enim accumsan.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. 
            In condimentum facilisis porta. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
            commodo vitae, ornare sit amet, wisi.
          </p>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@section('script')
<script>
</script>
@endsection