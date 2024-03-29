<div class="faqtitle card my-5 card py-5 px-3 px-lg-5 no-shadow border-0">
    <div class="alert alert-danger print-error-msg" style="display: <?php echo ((validation_errors() == '' || validation_errors() == null) ? "none;" : "block;")?>">
        <?php echo validation_errors(); ?>
    </div>

    <?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success" > 
            <?php  echo $this->session->flashdata('success'); $this->session->unset_userdata ( 'success' );?>
        </div>
    <?php } ?>  
    <?php if ($this->session->flashdata('error')){ ?>
        <div class="alert alert-danger" > 
            <?php  echo $this->session->flashdata('error'); $this->session->unset_userdata ( 'error' );?>
        </div>
    <?php } ?>
    <div>
        <div class="details">
            <h4>Table of Contents<br></h4>
            <div class="textlink" id="sublink">
                <h3 class="text" id="faqgen" onclick="display('gen-page')">GENERAL<br></h3>
                <h3 class="text" id="faqping" onclick="display('ping-page')">PING<br></h3>
                <h3 class="text" id="faqservprod" onclick="display('servprod-page')">SERVICES & PRODUCTS<br></h3>
                <h3 class="text" id="faqfa" onclick="display('fa-page')">FINANCIAL ASSISTANCE<br></h3>
            </div>
        </div>
        <!-- faq accordions -->
        <!-- main title -->
		<div class="faqsub col-12"> 
			<h1 class="content mb-4">Frequently Asked Questions</h1>
		</div>

        <!-- accordion items -->
        <div class="faq" id="gen-page">
            <button class="faqaccordion btn btn-bottom">
                <a>Question 1 - General</a>
            </button>
            <div class="faqpanel">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque malesuada ex metus, sed tristique leo faucibus vel. Duis at massa id nulla vestibulum efficitur. Curabitur nulla lorem, mattis in ullamcorper in, tempus id tortor. Duis sed ligula in risus hendrerit vestibulum. Ut facilisis mattis rutrum. Etiam efficitur nibh eu quam egestas, sit amet efficitur neque efficitur. Mauris viverra eros tempor elit scelerisque imperdiet. Duis condimentum ultrices placerat. Duis in libero vehicula, interdum diam eget, suscipit ligula. Nullam mauris sem, tempus id quam sed, condimentum ornare ipsum. Suspendisse potenti. Maecenas imperdiet, turpis eget cursus ullamcorper, sapien dui efficitur tellus, sit amet lacinia orci eros quis massa. Etiam accumsan gravida sapien ut consectetur. Aenean lacus massa, tincidunt eu blandit nec, lacinia id arcu. Nunc nulla purus, elementum id lacus eget, consequat commodo orci. Pellentesque a risus venenatis, iaculis lorem lobortis, volutpat tortor.</p>
            </div>

            <button class="faqaccordion btn btn-bottom">
                <a>Question 2 - General</a>
            </button>
            <div class="faqpanel">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque malesuada ex metus, sed tristique leo faucibus vel. Duis at massa id nulla vestibulum efficitur. Curabitur nulla lorem, mattis in ullamcorper in, tempus id tortor. Duis sed ligula in risus hendrerit vestibulum. Ut facilisis mattis rutrum. Etiam efficitur nibh eu quam egestas, sit amet efficitur neque efficitur. Mauris viverra eros tempor elit scelerisque imperdiet. Duis condimentum ultrices placerat. Duis in libero vehicula, interdum diam eget, suscipit ligula. Nullam mauris sem, tempus id quam sed, condimentum ornare ipsum. Suspendisse potenti. Maecenas imperdiet, turpis eget cursus ullamcorper, sapien dui efficitur tellus, sit amet lacinia orci eros quis massa. Etiam accumsan gravida sapien ut consectetur. Aenean lacus massa, tincidunt eu blandit nec, lacinia id arcu. Nunc nulla purus, elementum id lacus eget, consequat commodo orci. Pellentesque a risus venenatis, iaculis lorem lobortis, volutpat tortor.</p>
            </div>

            <button class="faqaccordion btn btn-bottom">
                <a>Question 3 - General</a>
            </button>
            <div class="faqpanel">
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque malesuada ex metus, sed tristique leo faucibus vel. Duis at massa id nulla vestibulum efficitur. Curabitur nulla lorem, mattis in ullamcorper in, tempus id tortor. Duis sed ligula in risus hendrerit vestibulum. Ut facilisis mattis rutrum. Etiam efficitur nibh eu quam egestas, sit amet efficitur neque efficitur. Mauris viverra eros tempor elit scelerisque imperdiet. Duis condimentum ultrices placerat. Duis in libero vehicula, interdum diam eget, suscipit ligula. Nullam mauris sem, tempus id quam sed, condimentum ornare ipsum. Suspendisse potenti. Maecenas imperdiet, turpis eget cursus ullamcorper, sapien dui efficitur tellus, sit amet lacinia orci eros quis massa. Etiam accumsan gravida sapien ut consectetur. Aenean lacus massa, tincidunt eu blandit nec, lacinia id arcu. Nunc nulla purus, elementum id lacus eget, consequat commodo orci. Pellentesque a risus venenatis, iaculis lorem lobortis, volutpat tortor.</p>
            </div>

            <button class="faqaccordion btn btn-bottom">
                <a>Question 4 - General</a>
            </button>
            <div class="faqpanel">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque malesuada ex metus, sed tristique leo faucibus vel. Duis at massa id nulla vestibulum efficitur. Curabitur nulla lorem, mattis in ullamcorper in, tempus id tortor. Duis sed ligula in risus hendrerit vestibulum. Ut facilisis mattis rutrum. Etiam efficitur nibh eu quam egestas, sit amet efficitur neque efficitur. Mauris viverra eros tempor elit scelerisque imperdiet. Duis condimentum ultrices placerat. Duis in libero vehicula, interdum diam eget, suscipit ligula. Nullam mauris sem, tempus id quam sed, condimentum ornare ipsum. Suspendisse potenti. Maecenas imperdiet, turpis eget cursus ullamcorper, sapien dui efficitur tellus, sit amet lacinia orci eros quis massa. Etiam accumsan gravida sapien ut consectetur. Aenean lacus massa, tincidunt eu blandit nec, lacinia id arcu. Nunc nulla purus, elementum id lacus eget, consequat commodo orci. Pellentesque a risus venenatis, iaculis lorem lobortis, volutpat tortor.</p>
            </div>
        </div>

        <!-- accordion items -->
        <div class="faq" id="ping-page">
            <button class="faqaccordion btn btn-bottom">
                <a>Question 1 - Ping</a>
            </button>
            <div class="faqpanel">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque malesuada ex metus, sed tristique leo faucibus vel. Duis at massa id nulla vestibulum efficitur. Curabitur nulla lorem, mattis in ullamcorper in, tempus id tortor. Duis sed ligula in risus hendrerit vestibulum. Ut facilisis mattis rutrum. Etiam efficitur nibh eu quam egestas, sit amet efficitur neque efficitur. Mauris viverra eros tempor elit scelerisque imperdiet. Duis condimentum ultrices placerat. Duis in libero vehicula, interdum diam eget, suscipit ligula. Nullam mauris sem, tempus id quam sed, condimentum ornare ipsum. Suspendisse potenti. Maecenas imperdiet, turpis eget cursus ullamcorper, sapien dui efficitur tellus, sit amet lacinia orci eros quis massa. Etiam accumsan gravida sapien ut consectetur. Aenean lacus massa, tincidunt eu blandit nec, lacinia id arcu. Nunc nulla purus, elementum id lacus eget, consequat commodo orci. Pellentesque a risus venenatis, iaculis lorem lobortis, volutpat tortor.</p>
            </div>

            <button class="faqaccordion btn btn-bottom">
                <a>Question 2 - Ping</a>
            </button>
            <div class="faqpanel">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque malesuada ex metus, sed tristique leo faucibus vel. Duis at massa id nulla vestibulum efficitur. Curabitur nulla lorem, mattis in ullamcorper in, tempus id tortor. Duis sed ligula in risus hendrerit vestibulum. Ut facilisis mattis rutrum. Etiam efficitur nibh eu quam egestas, sit amet efficitur neque efficitur. Mauris viverra eros tempor elit scelerisque imperdiet. Duis condimentum ultrices placerat. Duis in libero vehicula, interdum diam eget, suscipit ligula. Nullam mauris sem, tempus id quam sed, condimentum ornare ipsum. Suspendisse potenti. Maecenas imperdiet, turpis eget cursus ullamcorper, sapien dui efficitur tellus, sit amet lacinia orci eros quis massa. Etiam accumsan gravida sapien ut consectetur. Aenean lacus massa, tincidunt eu blandit nec, lacinia id arcu. Nunc nulla purus, elementum id lacus eget, consequat commodo orci. Pellentesque a risus venenatis, iaculis lorem lobortis, volutpat tortor.</p>
            </div>

            <button class="faqaccordion btn btn-bottom">
                <a>Question 3 - Ping</a>
            </button>
            <div class="faqpanel">
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque malesuada ex metus, sed tristique leo faucibus vel. Duis at massa id nulla vestibulum efficitur. Curabitur nulla lorem, mattis in ullamcorper in, tempus id tortor. Duis sed ligula in risus hendrerit vestibulum. Ut facilisis mattis rutrum. Etiam efficitur nibh eu quam egestas, sit amet efficitur neque efficitur. Mauris viverra eros tempor elit scelerisque imperdiet. Duis condimentum ultrices placerat. Duis in libero vehicula, interdum diam eget, suscipit ligula. Nullam mauris sem, tempus id quam sed, condimentum ornare ipsum. Suspendisse potenti. Maecenas imperdiet, turpis eget cursus ullamcorper, sapien dui efficitur tellus, sit amet lacinia orci eros quis massa. Etiam accumsan gravida sapien ut consectetur. Aenean lacus massa, tincidunt eu blandit nec, lacinia id arcu. Nunc nulla purus, elementum id lacus eget, consequat commodo orci. Pellentesque a risus venenatis, iaculis lorem lobortis, volutpat tortor.</p>
            </div>

        </div>

        <!-- accordion items -->
        <div class="faq" id="servprod-page">
            <button class="faqaccordion btn btn-bottom">
                <a>Question 1 - Services & Products</a>
            </button>
            <div class="faqpanel">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque malesuada ex metus, sed tristique leo faucibus vel. Duis at massa id nulla vestibulum efficitur. Curabitur nulla lorem, mattis in ullamcorper in, tempus id tortor. Duis sed ligula in risus hendrerit vestibulum. Ut facilisis mattis rutrum. Etiam efficitur nibh eu quam egestas, sit amet efficitur neque efficitur. Mauris viverra eros tempor elit scelerisque imperdiet. Duis condimentum ultrices placerat. Duis in libero vehicula, interdum diam eget, suscipit ligula. Nullam mauris sem, tempus id quam sed, condimentum ornare ipsum. Suspendisse potenti. Maecenas imperdiet, turpis eget cursus ullamcorper, sapien dui efficitur tellus, sit amet lacinia orci eros quis massa. Etiam accumsan gravida sapien ut consectetur. Aenean lacus massa, tincidunt eu blandit nec, lacinia id arcu. Nunc nulla purus, elementum id lacus eget, consequat commodo orci. Pellentesque a risus venenatis, iaculis lorem lobortis, volutpat tortor.</p>
            </div>

            <button class="faqaccordion btn btn-bottom">
                <a>Question 2 - Services & Products</a>
            </button>
            <div class="faqpanel">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque malesuada ex metus, sed tristique leo faucibus vel. Duis at massa id nulla vestibulum efficitur. Curabitur nulla lorem, mattis in ullamcorper in, tempus id tortor. Duis sed ligula in risus hendrerit vestibulum. Ut facilisis mattis rutrum. Etiam efficitur nibh eu quam egestas, sit amet efficitur neque efficitur. Mauris viverra eros tempor elit scelerisque imperdiet. Duis condimentum ultrices placerat. Duis in libero vehicula, interdum diam eget, suscipit ligula. Nullam mauris sem, tempus id quam sed, condimentum ornare ipsum. Suspendisse potenti. Maecenas imperdiet, turpis eget cursus ullamcorper, sapien dui efficitur tellus, sit amet lacinia orci eros quis massa. Etiam accumsan gravida sapien ut consectetur. Aenean lacus massa, tincidunt eu blandit nec, lacinia id arcu. Nunc nulla purus, elementum id lacus eget, consequat commodo orci. Pellentesque a risus venenatis, iaculis lorem lobortis, volutpat tortor.</p>
            </div>

            <button class="faqaccordion btn btn-bottom">
                <a>Question 3 - Services & Products</a>
            </button>
            <div class="faqpanel">
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque malesuada ex metus, sed tristique leo faucibus vel. Duis at massa id nulla vestibulum efficitur. Curabitur nulla lorem, mattis in ullamcorper in, tempus id tortor. Duis sed ligula in risus hendrerit vestibulum. Ut facilisis mattis rutrum. Etiam efficitur nibh eu quam egestas, sit amet efficitur neque efficitur. Mauris viverra eros tempor elit scelerisque imperdiet. Duis condimentum ultrices placerat. Duis in libero vehicula, interdum diam eget, suscipit ligula. Nullam mauris sem, tempus id quam sed, condimentum ornare ipsum. Suspendisse potenti. Maecenas imperdiet, turpis eget cursus ullamcorper, sapien dui efficitur tellus, sit amet lacinia orci eros quis massa. Etiam accumsan gravida sapien ut consectetur. Aenean lacus massa, tincidunt eu blandit nec, lacinia id arcu. Nunc nulla purus, elementum id lacus eget, consequat commodo orci. Pellentesque a risus venenatis, iaculis lorem lobortis, volutpat tortor.</p>
            </div>

            <button class="faqaccordion btn btn-bottom">
                <a>Question 4 - Services & Products</a>
            </button>
            <div class="faqpanel">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque malesuada ex metus, sed tristique leo faucibus vel. Duis at massa id nulla vestibulum efficitur. Curabitur nulla lorem, mattis in ullamcorper in, tempus id tortor. Duis sed ligula in risus hendrerit vestibulum. Ut facilisis mattis rutrum. Etiam efficitur nibh eu quam egestas, sit amet efficitur neque efficitur. Mauris viverra eros tempor elit scelerisque imperdiet. Duis condimentum ultrices placerat. Duis in libero vehicula, interdum diam eget, suscipit ligula. Nullam mauris sem, tempus id quam sed, condimentum ornare ipsum. Suspendisse potenti. Maecenas imperdiet, turpis eget cursus ullamcorper, sapien dui efficitur tellus, sit amet lacinia orci eros quis massa. Etiam accumsan gravida sapien ut consectetur. Aenean lacus massa, tincidunt eu blandit nec, lacinia id arcu. Nunc nulla purus, elementum id lacus eget, consequat commodo orci. Pellentesque a risus venenatis, iaculis lorem lobortis, volutpat tortor.</p>
            </div>
        </div>

        <!-- accordion items -->
        <div class="faq" id="fa-page">
            <button class="faqaccordion btn btn-bottom">
                <a>Question 1 - Financial Assistance</a>
            </button>
            <div class="faqpanel">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque malesuada ex metus, sed tristique leo faucibus vel. Duis at massa id nulla vestibulum efficitur. Curabitur nulla lorem, mattis in ullamcorper in, tempus id tortor. Duis sed ligula in risus hendrerit vestibulum. Ut facilisis mattis rutrum. Etiam efficitur nibh eu quam egestas, sit amet efficitur neque efficitur. Mauris viverra eros tempor elit scelerisque imperdiet. Duis condimentum ultrices placerat. Duis in libero vehicula, interdum diam eget, suscipit ligula. Nullam mauris sem, tempus id quam sed, condimentum ornare ipsum. Suspendisse potenti. Maecenas imperdiet, turpis eget cursus ullamcorper, sapien dui efficitur tellus, sit amet lacinia orci eros quis massa. Etiam accumsan gravida sapien ut consectetur. Aenean lacus massa, tincidunt eu blandit nec, lacinia id arcu. Nunc nulla purus, elementum id lacus eget, consequat commodo orci. Pellentesque a risus venenatis, iaculis lorem lobortis, volutpat tortor.</p>
            </div>

            <button class="faqaccordion btn btn-bottom">
                <a>Question 2 - Financial Assistance</a>
            </button>
            <div class="faqpanel">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque malesuada ex metus, sed tristique leo faucibus vel. Duis at massa id nulla vestibulum efficitur. Curabitur nulla lorem, mattis in ullamcorper in, tempus id tortor. Duis sed ligula in risus hendrerit vestibulum. Ut facilisis mattis rutrum. Etiam efficitur nibh eu quam egestas, sit amet efficitur neque efficitur. Mauris viverra eros tempor elit scelerisque imperdiet. Duis condimentum ultrices placerat. Duis in libero vehicula, interdum diam eget, suscipit ligula. Nullam mauris sem, tempus id quam sed, condimentum ornare ipsum. Suspendisse potenti. Maecenas imperdiet, turpis eget cursus ullamcorper, sapien dui efficitur tellus, sit amet lacinia orci eros quis massa. Etiam accumsan gravida sapien ut consectetur. Aenean lacus massa, tincidunt eu blandit nec, lacinia id arcu. Nunc nulla purus, elementum id lacus eget, consequat commodo orci. Pellentesque a risus venenatis, iaculis lorem lobortis, volutpat tortor.</p>
            </div>

            <button class="faqaccordion btn btn-bottom">
                <a>Question 3 - Financial Assistance</a>
            </button>
            <div class="faqpanel">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque malesuada ex metus, sed tristique leo faucibus vel. Duis at massa id nulla vestibulum efficitur. Curabitur nulla lorem, mattis in ullamcorper in, tempus id tortor. Duis sed ligula in risus hendrerit vestibulum. Ut facilisis mattis rutrum. Etiam efficitur nibh eu quam egestas, sit amet efficitur neque efficitur. Mauris viverra eros tempor elit scelerisque imperdiet. Duis condimentum ultrices placerat. Duis in libero vehicula, interdum diam eget, suscipit ligula. Nullam mauris sem, tempus id quam sed, condimentum ornare ipsum. Suspendisse potenti. Maecenas imperdiet, turpis eget cursus ullamcorper, sapien dui efficitur tellus, sit amet lacinia orci eros quis massa. Etiam accumsan gravida sapien ut consectetur. Aenean lacus massa, tincidunt eu blandit nec, lacinia id arcu. Nunc nulla purus, elementum id lacus eget, consequat commodo orci. Pellentesque a risus venenatis, iaculis lorem lobortis, volutpat tortor.</p>
            </div>
        </div>
    </div>
</div>
<div class="card border-0">
    <img src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/services.jpg" alt="contactus" class="picture">
    <div class="overlay"></div>
    <div class="textform">
        <p>HAVE SOME <br>QUESTIONS?</p>
    </div>
    <div class="faqform">
        <?php echo form_open_multipart('main/contactus') ?>
            <div class="form-label-group">
                <input type="text" class="faqfname form-control" id="faqfname" placeholder="First Name" name="faqfname" >
                <label for="faqfname" class="faqlabel">First Name</label>
            </div>

            <div class="form-label-group">
                <input type="text" class="faqlname form-control" id="faqfname" placeholder="Last Name" name="faqlname" >
                <label for="faqlname" class="faqlabel">Last Name</label>
            </div>

            <div class="form-label-group">
                <input type="text" class="faqlname form-control" id="faqcompname" placeholder="Company Name" name="faqcompname" >
                <label for="faqcompname" class="faqlabel">Company Name</label>
            </div>

            <div class="form-label-group">
                <input type="email" class="faqemail form-control" id="faqemail" placeholder="Email Address" name="faqemail" >
                <label for="faqemail" class="faqlabel">Email Address</label>
            </div>    

            <!-- <div class="form-label-group">
                <textarea class="faqqst form-control" id="faqqst" rows="3" placeholder="Concern" ></textarea>
            </div> -->
            <div class="form-label-group">
                <!-- <label for="faqqst" class="faqlabel">Product Description</label> -->
                <textarea placeholder="Input Summary of Concern" class="form-control faqqst" id="faqqst" name="faqqst"></textarea>
            </div>
            <button type="submit" class="faqBtn btn btn-lg">SEND MESSAGE</button>
        <?php echo form_close() ?>
    </div>
    
</div>




