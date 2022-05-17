

<div class="container">
    <?php if(!empty(cart()->contents())){?>
     
  
    <div>
        <form action="update_cart" method="post">
<?php 
foreach (cart()->contents() as $key => $value) {
    
    ?>
    <input type="hidden" name="rowid"  value="<?= $value['rowid'] ?>" >
    <span>Name : <?= $value['name'] ?></span>
    <span>id : <?= $value['id'] ?></span>
    <span>quantity : <?= $value['qty'] ?></span>
    <input type="number" name="quantity" placeholder="quantity">
    <span>price : <?= $value['price'] ?></span>
    <input type="number" name="price" placeholder="price">
    <br>
<?php } ?>
<button type="submit">update</button>
</form>
</div>
<?php
} ?>
<br>
<br>


	
		 
		</form>
</div>