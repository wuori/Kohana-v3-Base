
					<ul class="pagination">
						<?php if ($first_page !== FALSE): ?>
							<!-- <li><a href="<?php echo $page->url($first_page) ?>"><?php echo __('First') ?></a></li> -->
						<?php else: ?>
							<?php //echo __('First') ?>
						<?php endif ?>
						<?php if ($previous_page !== FALSE): ?>
							<li><a href="<?php echo $page->url($previous_page) ?>"><?php echo '&laquo;' ?></a></li>
						<?php else: ?>
							<li class="prev"><?php echo '&laquo;' ?></li>
						<?php endif ?>
						<?php for ($i = 1; $i <= $total_pages; $i++): ?>
							<?php if ($i == $current_page): ?>
								<li class="current_page"><?php echo $i ?></li>
							<?php else: ?>
								<li><a href="<?php echo $page->url($i) ?>"><?php echo $i ?></a></li>
							<?php endif ?>
						<?php endfor ?>
						<?php if ($next_page !== FALSE): ?>
							<li><a href="<?php echo $page->url($next_page) ?>"><?php echo '&raquo;' ?></a></li>
						<?php else: ?>
							<li class="next"><?php echo '&raquo;' ?></li>
						<?php endif ?>
						<?php if ($last_page !== FALSE): ?>
							<!-- <li><a href="<?php echo $page->url($last_page) ?>"><?php echo __('Last') ?></a></li> -->
						<?php else: ?>
							<?php //echo __('Last') ?>
						<?php endif ?>
					</ul>
