<form method="GET" action="<?php echo esc_url(home_url('/')); ?>" class="relative" role="search">
    <label for="search-input" class="sr-only"><?php _e('Buscar', 'animatek'); ?></label>
    <input type="search" id="search-input" name="s" class="border border-dark/10 px-4 py-2 text-sm rounded-full bg-white dark:bg-slate-800 dark:text-slate-200 dark:border-slate-600" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e('Buscar…', 'animatek'); ?>">
    <button type="submit" class="absolute right-2 top-2" aria-label="<?php esc_attr_e('Buscar', 'animatek'); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="text-dark/70 dark:text-slate-400 size-5">
            <path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" />
        </svg>
    </button>
</form>
