<!-- text
email
radio
checkbox
select
submit     -->
<form class="contact" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <fieldset>
        <label>First Name</label>
        <input type="text" name="firstName" value="<?php 
        if(isset($_POST['firstName'])) echo htmlspecialchars($_POST['firstName']);?>">
        <span><?php echo $firstNameErr; ?></span>

        <label>Last Name</label>
        <input type="text" name="lastName" value="<?php 
        if(isset($_POST['lastName'])) echo htmlspecialchars($_POST['lastName']);?>">
        <span><?php echo $lastNameErr; ?></span> 
        
        <label>Email</label>
        <input type="email" name="email"  value="<?php 
        if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']);?>">
        <span><?php echo $emailErr; ?></span>
        
        <label>Phone Number</label>
        <input type="tel" placeholder="xxx-xxx-xxxx" name="tel"  value="<?php 
        if(isset($_POST['tel'])) echo htmlspecialchars($_POST['tel']);?>">
        <span><?php echo $telErr; ?></span>

        <label>Preferred way to contact with you</label>
            <!-- radio and check boxes similar, checked =checked -->
            <ul>
            <li><input type="checkbox" name="contact[]" value="Email"
            <?php if(isset($_POST['contact']) && $_POST['contact'] == 'Email') echo 'checked="checked"'; ?>
            >Email</li>
            <li><input type="checkbox" name="contact[]" value="Call"
            <?php if(isset($_POST['contact']) && $_POST['contact'] == 'Call') echo 'checked="checked"'; ?>
            >Call</li>
            <li><input type="checkbox" name="contact[]" value="Text"
            <?php if(isset($_POST['contact']) && $_POST['contact'] == 'Text') echo 'checked="checked"'; ?>
            >Text</li>
            </ul>
            <span><?php echo $contactErr; ?></span>
            
        <label>What property are you interested in?</label>
            <select name="property">
            <option value="NULL"
                <?php if(isset($_POST['property']) && $_POST == 'NULL') {
                    echo 'selected == "unselected"'; } ?>
            >Select one</option>

            <option value="$14,895,000 Condo"
                <?php if(isset($_POST['property']) && $_POST['property'] == '$14,895,000 Condo') {
                    echo 'selected == "selected"'; } ?>
            >$14,895,000 Condo</option>

            <option value="$14,700,000 Single Family"
                <?php if(isset($_POST['property']) && $_POST['property'] == '$14,700,000 Single Family') {
                    echo 'selected == "selected"'; } ?>
            >$14,700,000 Single Family</option>
            
            <option value="$12,400,000 Single Family"
                <?php if(isset($_POST['property']) && $_POST['property'] == '$12,400,000 Single Family') {
                    echo 'selected == "selected"'; } ?>
            >$12,400,000 Single Family</option>

            <option value="$9,388,000 Condo"
                <?php if(isset($_POST['property']) && $_POST['property'] == '$9,388,000 Condo') {
                    echo 'selected == "selected"'; } ?>
            >$9,388,000 Condo</option>

            <option value="$$7,695,000 Condo"
                <?php if(isset($_POST['property']) && $_POST['property'] == '$7,695,000 Condo') {
                    echo 'selected == "selected"'; } ?>
            >$7,695,000 Condo</option>

            <option value="$6,995,000 Single Family"
                <?php if(isset($_POST['property']) && $_POST['property'] == '$6,995,000 Single Family') {
                    echo 'selected == "selected"'; } ?>
            >$6,995,000 Single Family</option>
            </select>
            <span><?php echo $propertyErr; ?></span>

        <label>Comments</label>
            <textarea name="comments"><?php 
        if(isset($_POST['comments'])) echo htmlspecialchars($_POST['comments']);?></textarea>
        <span><?php echo $commentsErr; ?></span>
        <label></label>
            
        <input type="radio" name="privacy" value="<?php 
            if (isset($_POST['privacy'])) echo htmlspecialchars($_POST['privacy']);?>">
            I agree to the Privacy Policy
            <span><?php echo $privacyErr; ?></span>
        
        <input type="submit" value="Send it!">
        
        <p><a href="">Reset me!</a></p>
        
    </fieldset>
    </form>
