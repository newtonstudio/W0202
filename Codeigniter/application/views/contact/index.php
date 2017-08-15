

    <div class="container">

      <div class="starter-template">

        <?php
        if(isset($hasSent)) {
          ?>
          <div class="alert alert-danger">
            Thanks for submitting your message to us! We will get back to you soon.
          </div>
          <?php
        }
        ?>
        

        <form method="POST" action="<?=base_url('contact_submit')?>">
          <input type="hidden" name="mode" value="<?=$mode?>" />
          <input type="hidden" name="id" value="<?=$mode!="Add"?$contactData['id']:''?>" />

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Input your name" value="<?=$mode!="Add"?$contactData['name']:''?>">
          </div>

         

          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control"  name="email" id="exampleInputEmail1" placeholder="Email" value="<?=$mode!="Add"?$contactData['email']:''?>">
          </div>

           <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" class="form-control" id="message" placeholder="Input your message"><?=$mode!="Add"?$contactData['message']:''?></textarea>
          </div>
          
          
          
          <button type="submit" class="btn btn-default">Submit</button>
        </form>


      </div>

    </div><!-- /.container -->




    