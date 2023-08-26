<div class="col-md-10 mx-auto formcoluser">
                <div class="row mainrowformuser">
                    <div class="col-12 headingcoluser">
                         <div class="heading">
                            <h1>New patient registration</h1>
                            <p>please fill the form below</p>
                            <hr>
                         </div>
                    </div>
                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>">
                    <div class="col-12 patientinfo">
                        <div class="registerdate">
                            <h1>Registration Date and Time</h1>
                            <div class="inputfielddate">
                                <input required='true' type="date" id="start" name="rdate"  />
                                <input required='true' type="time" id="appt" name="rtime"  />
                            </div>
                        </div>
                        <div class="mb-3 patientname">
                            <label for="exampleFormControlInput1" class="form-label">Patientname: </label>
                            <input required='true' type="text" class="form-control" name='name' id="exampleFormControlInput1" placeholder="firstname">
                            <input required='true' type="text" class="form-control" id="exampleFormControlInput2" placeholder="lastname">
                          </div>
                        <div class="mb-3 patientname">
                            <label for="exampleFormControlInput1" class="form-label">Gender: </label>
                            <div class="form-check formradio">
                                <input required='true' class="form-check-input" type="radio" name="gender" value='Male' id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Male
                                </label>
                              </div>
                              <div class="form-check formradio">
                                <input required='true' class="form-check-input" type="radio" name="gender" value='female' id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Female
                                </label>
                              </div>
                          </div>
                          <div class="mb-3 patientname">
                            <label for="exampleFormControlInput1" class="form-label">DateofBirth: </label>
                            <div class="inputfielddate">
                                <input required='true' type="date" id="start" name='dbdate' />
                            </div>
                        </div>
                        <div class="mb-3 patientname">
                            <label for="exampleFormControlInput1" class="form-label">Phone number: </label>
                            <input required='true' type="number" minlength='10' class="form-control" name='phonenumber' id="exampleFormControlInput1" placeholder="Phonenumber">
                          </div>
                          <div class="mb-3 patientname">
                            <label for="exampleFormControlInput1" class="form-label">Email: </label>
                            <input required='true' type="email" autocomplete='off' class="form-control" name='email' id="exampleFormControlInput1" placeholder="Patient Email please">
                          </div>
                          <div class="mb-3 patientname">
                            <label for="exampleFormControlTextarea1" class="form-label">Address:</label>
                            <textarea required='true' class="form-control fs-5"  name='address' id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>
                          <div class="mb-3 patientname">
                            <select class="form-select form-select-lg mb-3" name='patientinfo' required='true' aria-label="Large select example">
                                <option value="Student">Student</option>
                                <option value="Faculty">Faculty</option>
                              </select>
                          </div> 
                          <div class="healthistory">
                          <div class="mb-3 patientname ">
                              <h1>Health history :-</h1>        
                          </div>
                          <div class="mb-3 patientname">
                            <label for="exampleFormControlInput1" class="form-label">Reason for Registration </label>
                            <input required='true' type="text" class="form-control" name='reason' id="exampleFormControlInput1">
                          </div>
                          <div class="mb-3 patientname">
                            <label for="exampleFormControlTextarea1" class="form-label">Additional Notes:</label>
                            <textarea required='true' placeholder='type NULL for No' class="form-control" name='notes' id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>
                          <div class="mb-3 patientname">
                            <label for="exampleFormControlInput1" class="form-label">Taking any medications, currently? </label>
                            <div class="form-check formradio">
                                <input required='true' class="form-check-input" type="radio" name="medicine" value='yes' id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Yes
                                </label>
                              </div>
                              <div class="form-check formradio">
                                <input required='true' class="form-check-input" type="radio" name="medicine" value='no' id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                  No
                                </label>
                              </div>
                          </div>  
                         </div>  
                         <button type="submit" name='submit' class="btn btn-outline-dark formbtn">Submit</button>
                    </div>
                </form>
                </div>
            </div>