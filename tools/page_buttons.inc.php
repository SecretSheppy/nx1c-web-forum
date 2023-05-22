<?php

function render_pages_buttons($next_post_block, $last_post_id):void
{
    echo <<< HTML
    <div class="pre-footer">
        <div class="inner">
    HTML;

    if ($next_post_block != null) {
        $next_post_block = $next_post_block + 30;
        echo <<< HTML
        <div class="prev">
            <form>
                <input type="hidden" name="post-block" value="{$next_post_block}" />
                <input type="submit" value="Previous" />
            </form>
        </div>
        HTML;
    }

    echo <<< HTML
            <div class="next">
                <form>
                    <input type="hidden" name="post-block" value="{$last_post_id}" />
                    <input type="submit" value="Next" />
                </form>
            </div>
        </div>
    </div>
    HTML;
}