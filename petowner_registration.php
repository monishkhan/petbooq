<h2>Pet owner registration</h2>
<form action="process.php" method="post" name="petowner">
    <select name="pet_type">
        <option>Select type of pet</option>
        <option value="A">A</option>
        <option value="B">B</option>
    </select>
    
    <input type="text" name="dob" placeholder="dob">
    <select name="sex">
        <option>Select sext</option>
        <option value="m">Male</option>
        <option value="f">Female</option>
    </select>
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="phone" placeholder="phone">
    <select name="country">
        <option>Select country</option>
        <option value="india">India</option>
        <option value="London">London</option>
    </select>
    <button type="submit" name="submit_pet">Submit</button>
</form>



