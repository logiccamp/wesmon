<?php $__env->startSection('title'); ?>
    <?php echo e(__('Blog Details')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-title">
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
            <ul class="breadcrumbs">
                <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a>
                </li>
                <li class="separator"></li>
                <li><a href="<?php echo e(route('front.blog')); ?>"><?php echo e(__('Blog')); ?></a>
                </li>
                <li class="separator"></li>
                <li><?php echo e($post->title); ?></li>
              </ul>
          </div>
      </div>
    </div>
  </div>
  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-1">
  <div class="row">
          <!-- Content-->
          <div class="col-xl-9 col-lg-8 order-lg-2">
            <div class="card blog-details-box">
                <!-- Gallery-->
                <div class="blog-details-slider owl-carousel">

                    <?php $__currentLoopData = json_decode($post->photo,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e(asset('assets/images/'.$photo)); ?>" alt="Image">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="blog-details-main-content">
                    <h4 class="pt-4 b-d-title"><?php echo e($post->title); ?></h4>
                <ul class="post-meta mb-4">
                    <li><i class="icon-user"></i><a href="javascript:;}"><?php echo e(__('Admin')); ?></a></li>
                    <li><i class="icon-tag"></i><a href="<?php echo e(route('front.blog').'?category='.$post->category->slug); ?>"><?php echo e($post->category->name); ?></a></li>
                    <li><i class="icon-clock"></i><a href="javascript:;"><?php echo e(date('jS F, Y', strtotime($post->created_at))); ?></a></li>
                    </ul>
                <div>
                    <?php echo $post->details; ?>

                </div>

                <!-- Post Tags + Share-->
                <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 pb-4">

                    <?php if($post->tags): ?>
                    <div class="pb-2">
                        <?php echo e(__('Tags :')); ?>

                        <?php $__currentLoopData = explode(',',$post->tags); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($loop->last): ?>
                        <a class="text-sm text-muted navi-link" href="<?php echo e(route('front.blog').'?tag='.$tag); ?>"><?php echo e($tag); ?></a>
                        <?php else: ?>
                        <a class="text-sm text-muted navi-link" href="<?php echo e(route('front.blog').'?tag='.$tag); ?>"><?php echo e($tag); ?></a>,
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                    <div class="d-flex align-items-center">
                        <span class="text-muted mr-1"><?php echo e(__('Share')); ?>: </span>
                        <div class="d-inline-block a2a_kit">
                            <a class="facebook  a2a_button_facebook" href="">
                                <span><i class="fab fa-facebook-f"></i></span>
                            </a>
                            <a class="twitter  a2a_button_twitter" href="">
                                <span><i class="fab fa-twitter"></i></span>
                            </a>
                            <a class="linkedin  a2a_button_linkedin" href="">
                                <span><i class="fab fa-linkedin-in"></i></span>
                            </a>
                            <a class="pinterest   a2a_button_pinterest" href="">
                                <span><i class="fab fa-pinterest"></i></span>
                            </a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                    </div>
                </div>
                </div>
            </div>

            <?php if($setting->is_disqus == 1): ?>

                <div class="card mb-30">
                    <div class="card-body">
                      <?php echo $setting->disqus; ?>

                    </div>
                </div>
            <?php endif; ?>
            <?php if($post->category->posts->where('id','!=',$post->id)->count() > 0): ?>

                <div class="row">
                    <div class="col-lg-12 pb-2">
                        <div class="section-title">
                            <h2 class="h3"><?php echo e(__('You May Also Like')); ?></h2>
                        </div>
                    </div>
                </div>
                <!-- Relevant Posts-->
                <div class="resent-blog-slider owl-carousel" >

                    <?php $__currentLoopData = $post->category->posts->where('id','!=',$post->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="widget widget-featured-posts">
                        <div class="entry">
                        <div class="entry-thumb"><a href="<?php echo e(route('front.blog.details',$like_post->slug)); ?>"><img src="<?php echo e(asset('assets/images/'.json_decode($like_post->photo,true)[array_key_first(json_decode($like_post->photo,true))])); ?>" alt="Post"></a></div>
                        <div class="entry-content">
                            <h4 class="entry-title"><a href="<?php echo e(route('front.blog.details',$like_post->slug)); ?>">
                                <?php echo e(strlen(strip_tags($like_post->title)) > 75 ? substr(strip_tags($like_post->title), 0, 75) . '...' : strip_tags($like_post->title)); ?>

                            </a></h4><span class="entry-meta"><?php echo e(__('by')); ?> <?php echo e(__('Admin')); ?></span>
                        </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

          </div>
          <!-- Sidebar          -->
          <div class="col-xl-3 col-lg-4 order-lg-1">
            <div class="sidebar-toggle position-left"><i class="icon-filter"></i></div>
            <aside class="sidebar sidebar-offcanvas position-left"><span class="sidebar-close"><i class="icon-x"></i></span>
              <!-- Widget Search-->
              <section class="widget mb-30">
                <form action="<?php echo e(route('front.blog')); ?>" class="input-group form-group" method="get"><span class="input-group-btn">
                    <button type="submit"><i class="icon-search"></i></button></span>
                  <input class="form-control" name="search" type="text" placeholder="<?php echo e(__('Search blog')); ?>">
                </form>
              </section>
              <!-- Widget Categories-->
              <section class="widget widget-categories card rounded p-4 mt-n3  mb-30">
                <h3 class="widget-title"><?php echo e(__('Blog Categories')); ?></h3>
                <ul>
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><a href="<?php echo e(route('front.blog').'?category='.$category->slug); ?>"><?php echo e($category->name); ?></a><span><?php echo e($category->posts_count); ?></span></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
              </section>
              <!-- Widget Featured Posts-->
              <section class="widget widget-featured-posts card rounded p-4 mb-30">
                <h3 class="widget-title"><?php echo e(__('Most Recent Added Posts')); ?></h3>
               <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="entry">
                <div class="entry-thumb"><a href="<?php echo e(route('front.blog.details',$recent->slug)); ?>"><img src="<?php echo e(asset('assets/images/'.json_decode($recent->photo,true)[array_key_first(json_decode($recent->photo,true))])); ?>" alt="Post"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="<?php echo e(route('front.blog.details',$recent->slug)); ?>">
                    <?php echo e(strlen(strip_tags($recent->title)) > 55 ? substr(strip_tags($recent->title), 0, 55) . '...' : strip_tags($recent->title)); ?>


                </a></h4><span class="entry-meta"><?php echo e(__('by')); ?> <?php echo e(__('Admin')); ?></span>
                </div>
              </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </section>
              <!-- Widget Tags-->
              <section class="widget widget-featured-posts card rounded p-4">
                <h3 class="widget-title"><?php echo e(__('Popular Tags')); ?></h3>
               <div>
                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="tag" href="<?php echo e(route('front.blog').'?tag='.$tag); ?>"><?php echo e($tag); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </div>
              </section>
            </aside>
          </div>
        </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\wes\core\resources\views/front/blog/show.blade.php ENDPATH**/ ?>