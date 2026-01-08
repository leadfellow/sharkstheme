/**
 * Blog Posts - Infinite Scroll & Category Filtering
 */

document.addEventListener('DOMContentLoaded', function() {
    const blogBlocks = document.querySelectorAll('.blog-posts-block');
    
    blogBlocks.forEach(block => {
        const loadingType = block.dataset.loadingType;
        
        if (loadingType === 'infinite') {
            initInfiniteScroll(block);
        }
        
        // Category filtering with AJAX
        initCategoryFilter(block);
    });
});

/**
 * Initialize infinite scroll
 */
function initInfiniteScroll(block) {
    const loadMoreBtn = block.querySelector('.blog-load-more');
    
    if (!loadMoreBtn) return;
    
    // Load more on button click
    loadMoreBtn.addEventListener('click', function() {
        loadMorePosts(block, loadMoreBtn);
    });
    
    // Optional: Auto-load when scrolling near bottom
    let isLoading = false;
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !isLoading && !loadMoreBtn.disabled) {
                loadMorePosts(block, loadMoreBtn);
            }
        });
    }, {
        rootMargin: '200px'
    });
    
    observer.observe(loadMoreBtn);
}

/**
 * Load more posts via AJAX
 */
function loadMorePosts(block, button) {
    const currentPage = parseInt(button.dataset.page);
    const maxPages = parseInt(button.dataset.maxPages);
    const category = button.dataset.category;
    const postsPerPage = block.dataset.postsPerPage;
    
    if (currentPage >= maxPages) {
        button.style.display = 'none';
        return;
    }
    
    // Show loading state
    button.classList.add('loading');
    button.disabled = true;
    
    const nextPage = currentPage + 1;
    
    // Prepare AJAX request
    const formData = new FormData();
    formData.append('action', 'load_more_blog_posts');
    formData.append('page', nextPage);
    formData.append('posts_per_page', postsPerPage);
    formData.append('category', category);
    formData.append('hover_color', block.dataset.hoverColor);
    
    // Send AJAX request
    fetch(blogPostsAjax.ajaxurl, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success && data.data.html) {
            // Append new posts to grid
            const grid = block.querySelector('.blog-posts-grid');
            grid.insertAdjacentHTML('beforeend', data.data.html);
            
            // Update button state
            button.dataset.page = nextPage;
            
            if (nextPage >= maxPages) {
                button.style.display = 'none';
            }
        }
    })
    .catch(error => {
        console.error('Error loading posts:', error);
    })
    .finally(() => {
        button.classList.remove('loading');
        button.disabled = false;
    });
}

/**
 * Initialize category filtering
 */
function initCategoryFilter(block) {
    const navItems = block.querySelectorAll('.blog-nav-item a');
    
    navItems.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const category = this.dataset.category;
            const postsPerPage = block.dataset.postsPerPage;
            const hoverColor = block.dataset.hoverColor;
            
            // Update active state
            block.querySelectorAll('.blog-nav-item').forEach(item => {
                item.classList.remove('active');
            });
            this.parentElement.classList.add('active');
            
            // Load filtered posts
            loadFilteredPosts(block, category, postsPerPage, hoverColor);
        });
    });
}

/**
 * Load filtered posts by category
 */
function loadFilteredPosts(block, category, postsPerPage, hoverColor) {
    const grid = block.querySelector('.blog-posts-grid');
    const loadMoreContainer = block.querySelector('.blog-load-more-container');
    const paginationContainer = block.querySelector('.blog-pagination');
    
    // Show loading state
    grid.style.opacity = '0.5';
    
    const formData = new FormData();
    formData.append('action', 'filter_blog_posts');
    formData.append('category', category);
    formData.append('posts_per_page', postsPerPage);
    formData.append('hover_color', hoverColor);
    formData.append('loading_type', block.dataset.loadingType);
    
    fetch(blogPostsAjax.ajaxurl, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Replace grid content
            grid.innerHTML = data.data.html;
            
            // Update load more button or pagination
            if (loadMoreContainer) {
                const loadMoreBtn = loadMoreContainer.querySelector('.blog-load-more');
                if (loadMoreBtn) {
                    loadMoreBtn.dataset.page = '1';
                    loadMoreBtn.dataset.maxPages = data.data.max_pages;
                    loadMoreBtn.dataset.category = category;
                    
                    if (data.data.max_pages > 1) {
                        loadMoreContainer.style.display = 'flex';
                    } else {
                        loadMoreContainer.style.display = 'none';
                    }
                }
            }
            
            if (paginationContainer && data.data.pagination) {
                paginationContainer.innerHTML = data.data.pagination;
            }
        }
    })
    .catch(error => {
        console.error('Error filtering posts:', error);
    })
    .finally(() => {
        grid.style.opacity = '1';
    });
}
