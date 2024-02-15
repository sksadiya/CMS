<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <nav class="main-menu">
                        <ul>
                            <li><a href="<?= base_url('/') ?>">Home</a>
                            </li>
                           
                            <li><a href="#">categories</a>
									<ul class="sub-menu">
                                    <?php foreach ($categories as $category): ?>
										<li>
                                    <a href="<?= base_url('home/postsByCategory/' . $category['cat_id']) ?>">
                                        <?= $category['cat_tittle'] ?>
                                    </a>
                                </li>
                                        <?php endforeach; ?>
									</ul>
								</li>
                            <?php foreach ($pages as $page): ?>
                                <li>
                                    <a href="<?= base_url('page/' . $page['slug']) ?>">
                                        <?= $page['page_title'] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                            
                                <li>
                                    <a href="<?= base_url('register') ?>">Subscribe</a>
                                </li>
                            
                            <li>
                                <a href="<?= base_url('admin') ?>">Admin</a>
                            </li>
                            <li>
                                <div class="header-icons">
                                    <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- search area -->
<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <div class="search-bar">
                    <div class="search-bar-tablecell">
                        <form action="<?= base_url('search') ?>" method="get">
                            <h3>Search For:</h3>
                            <input type="text" name="query" placeholder="Search...">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>