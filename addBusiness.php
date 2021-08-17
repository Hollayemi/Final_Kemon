<div class="modal fade" id="popReg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <section class="Reg-pop">
                <div class="modalBody">
                    <div class="titleBody">
                        <div class="MDB-title centerTitle">
                            <h3>Register Your Business</h3>
                            <p data-dismiss="modal" aria-label="Close"><i class="material-icons centt">close</i></i></p>
                        </div>
                    </div>
                    
                    <form action="" method="POST">
                        <div class="myLegend">
                            <!-- <p>Business Name</p> -->
                            <input type="text" name="Shop_Name"  placeholder="Business's Name">
                        </div>

                        <div class="FlexMyLegend">
                            <div class="eachFlexMyLegend">
                                <div class="myLegend">
                                    <p class="spaP">Business Short name</p>
                                    <input type="text" name="aka"  placeholder="Fixed name/title" >
                                </div>
                            </div>

                            <div class="eachFlexMyLegend">
                                <div class="myLegend">
                                    <p class="spaP">Business Line</p>
                                    <input type="text" name="BPhone"  placeholder=" Business Line">
                                </div>
                            </div>

                        </div>


                        <div class="myLegend">
                            <p>website</p>
                            <input type="url"  name="website"  placeholder="website">
                        </div>



                        <div class="FlexMyLegend">
                            <div class="eachFlexMyLegend">
                                <div class="myLegend">
                                    <p class="spaP">Bustop</p>
                                    <input type="text" name="Country" value="Nigeria" readonly> <br>
                                </div>
                            </div>

                            <div class="eachFlexMyLegend">
                                <div class="myLegend">
                                    <p class="spaP">Very Close To</p>
                                    <?php include('nigerial-states.php') ?><br>
                                </div>
                            </div>

                        </div>

                        
                        <div class="FlexMyLegend">
                            <div class="eachFlexMyLegend">
                                <div class="myLegend">
                                    <p class="spaP">City</p>
                                    <input type="text" id="guessCity"  name="City"     placeholder="City">
                                </div>
                            </div>

                            <div class="eachFlexMyLegend">
                                <div class="myLegend">
                                    <p class="spaP">Junction</p>
                                    <input type="text" id="guessRoad"       name="Junction"  placeholder="Junction">
                                </div>
                            </div>

                        </div>


                        <div class="FlexMyLegend">
                            <div class="eachFlexMyLegend">
                                <div class="myLegend">
                                    <p class="spaP">Bustop</p>
                                    <input type="text" id="guessBustop"  name="Bustop"  placeholder="Bustop">
                                </div>
                            </div>

                            <div class="eachFlexMyLegend">
                                <div class="myLegend">
                                    <p class="spaP">Very Close To</p>
                                    <input type="text" id="guessSuburb"  name="VCT"  placeholder="Very Close To">
                                </div>
                            </div>

                        </div>


                        <div class="FlexMyLegend">
                            <div class="eachFlexMyLegend">
                                <div class="myLegend">
                                    <p class="spaP">Latitude</p>
                                    <input type="text" id="latitude" name="latitude"  placeholder="latitude">
                                </div>
                            </div>

                            <div class="eachFlexMyLegend">
                                <div class="myLegend">
                                    <p class="spaP">Longitude</p>
                                    <input type="text" id="longitude" name="longitude" placeholder="longitude">
                                </div>
                            </div>


                        </div>


                        <div class="myLegend">
                            <p class="spaP">Qualifications</p>
                            <select data-placeholder="Dry cleaning" multiple="multiple"  class="chosen-select"  name="test[]">
                                
                                    <option onclick=lova value='Electronics' id="Electronics">Electronics</option>
                                    <option value='Hotel and Suites' id="Hotel">Hotel and Suites</option>
                                    <option value='Wears' id="Wears">Wears</option>
                                    <option value='Catering and decoration' id="Catering">Catering and decoration</option>
                                    <option value='Restaurant' id="Restaurant">Restaurant</option>
                                    <option value='Bar' id="Bar">Bar</option>
                                    <option value='Gym' id="Gym">Gym</option>
                                    <option value='Beauty supply' id="Beauty_supply">Beauty supply</option>
                                    <option value='Dry cleaning' id="Dry_cleaning">Dry cleaning</option>
                                    <option value='Car dealer' id="Car_dealer">Car dealer</option>
                                    <option value='Convenience store' id="Convenience_store" >Convenience store</option>
                                    <option value='Library' id="Library"  >Library</option>
                                    <option value='Fuel & Gas' id="Fuel_Gas">Fuel & Gas</option>
                                    <option value='Hospital & Pharmacy' id="Hospital_Pharmacy">Hospital & Pharmacy</option>
                                    <option value='Beauty salon' id="Beauty_salon">Beauty salon</option>
                                    <option value='Shopping center' id="Shopping_center">Shopping center</option>
                                    <option value='Car wash' id="Car_wash">Car wash</option>
                                    <option value='Movie' id="Movie">Movie</option>
                                    <option value='Furniture' id="Furniture">Furniture</option>
                                    <option value='Fruits' id="Fruits">Fruits</option>
                                    <option value='Mechanic' id="Mechanic">Mechanic</option>
                                    <option value='Sporting materials' id="Sporting_materials">Sporting materials</option>
                                    <option value='Laundry' id="laundry">Laundry</option>
                                    <option value='Clothing Materials & Styling' id="Clothing_Materials">Clothing Materials & Styling</option>
                                    <option value='Plasterer & Constructing Materials' id="constructing_Materials" >Plasterer & Constructing Materials</option>
                                    <option value='Agricultural Products' id="agriculturalProducts">Agricultural Products</option>
                                    <option value='Cyber Cafe' id="Cybercafe">Cyber Cafe</option>
                                    <option value='Automobile' id="Automobile">Automobile</option>


                            </select>
                            <h5 class="hideErr">Maximum amount reached</h5>
                        </div>
                        
                        <div class="FlexMyLegend">
                            <div class="eachFlexMyLegend">
                                <div class="myLegend">
                                    <p class="spaP">WhatsApp Line</p>
                                    <input type="text" name="Whatsapp"  placeholder="WhatsApp Line">
                                </div>
                            </div>
                            <div class="eachFlexMyLegend">
                                <div class="myLegend">
                                    <p class="spaP">Facebook URL</p>
                                    <input type="text"  name="Facebook" placeholder="Facebook URL">
                                </div>
                            </div>
                        </div>
                        <div class="myLegend">
                            <p class="spaP">Facebook URL</p>
                            <textarea type="text" id="Desc"  name="Desc" placeholder="What do you deal in"></textarea>
                        </div>
                    <br>
                        <div class="action_plus">
                            <button name="regBusiness" class="thickBtn longBtn">Register</button>
                        </div>
                    

                    </form>
                </div>
            </div>
            


            <script>
                $(".chosen-select").chosen({
                    no_results_text: "Oops, nothing found!"
                })

                $(".chosen-select").change(()=>{
                    var chosen = $(".chosen-select").val()
                    if((chosen.length+1) > 3) {
                        $('.chosen-results').css('display', "none");
                        $('.hideErr').addClass('showErr');
                    }else{
                        $('.chosen-results').css('display', "block");
                        $('.hideErr').removeClass('showErr');
                    }
                })

            </script>
        </section>
      </div>
    </div>
</div>