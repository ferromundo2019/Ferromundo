
    <header class="clearfix">
      <div id="logo" class="logo">
      
      </div>
      <h1>FERROMUNDO S.A. (purchase invoice)</h1>
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:ferromundo2019@gmail.com">ferromundo2019@gmail.com</a></div>
      </div>
      <div id="project">
        <div><span>PROJECT</span> Website development</div>
        <div><span>USER</span> <?= $user['name'].' '.$user['surname'] ?></div>
        <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>EMAIL</span> <a href="mailto:<?= $user['email']?>"><?= $user['email']?></a></div>
        <div><span>DATE</span> <?= date('d').'/'.date('m').'/'.date('Y')?></div>
        <!--<div><span>DUE DATE</span> September 17, 2015</div>-->
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">CODE</th>
            <th class="service">ARTICLE</th>
            <th class="desc">DESCRIPTION</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($detallesCompra as $details): ?>
          <tr>
            <td class="service"><?= $details['code'] ?></td>
            <td class="service"><?= $details['article'] ?></td>
            <td class="desc"><?= $details['description'] ?></td>
            <td class="unit"><?= 'S/.'.$details['cost'] ?></td>
            <td class="qty"><?= $details['quantity'] ?></td>
            <td class="total"><?= 'S/.'.$details['total'] ?></td>
          </tr>
          <?php endforeach; ?>
          
          <!--<tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">$1,300.00</td>
          </tr>-->
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total"><?= 'S/.'.$total ?></td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>