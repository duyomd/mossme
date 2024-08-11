<input type="hidden" name="selected_key" id="selected_key"/>
<input type="hidden" name="selected_index" id="selected_index"/>
<input type="hidden" name="mode" id="mode"/>

<input type="hidden" name="currentPage" id="currentPage"/>
<input type="hidden" name="orderBys" id="orderBys"/>
<input type="hidden" name="sortOrders" id="sortOrders"/>

<input type="hidden" name="conditions" id="conditions"/>

<input type="hidden" id="csrf-name" name="csrf-name" value="<?=csrf_token()?>"/>
<input type="hidden" id="<?=csrf_token()?>" name="<?=csrf_token()?>" value="<?=csrf_hash()?>"/>