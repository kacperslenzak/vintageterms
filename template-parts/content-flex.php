<?php

if (have_rows('flexible_content')){
	while(have_rows('flexible_content')) { the_row();
		get_template_part('template-parts/flex-content/flex', get_row_layout());
	}
}
