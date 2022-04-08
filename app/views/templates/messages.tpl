 <div class="messages">
        {if $msgs-> isError()}
            <ul>
                {foreach $msgs->getErrors() as $msg}
                    <li>{$msg}</li>
                {/foreach}
            </ul>
        {/if}
 </div>
