<div>
    @once
        @push('page-styles')
            <link rel="stylesheet" href="{{ asset('frontend/css/contact.css') }}">
        @endpush
    @endonce

    <!-- Contact Cards -->
    <section class="contact-cards-section">
        <div class="contact-cards-grid">
            <div class="contact-card">
                <div class="icon"><i class="fas fa-phone"></i></div>
                <h3>Call Us</h3>
                <a href="tel:{{$contact->phone}}">{{$contact->phone}}</a> or
                <a href="tel:{{$contact->phone_2}}">{{$contact->phone_2}}</a>
            </div>
            <div class="contact-card">
                <div class="icon"><i class="fas fa-envelope"></i></div>
                <h3>Email Us</h3>
                <a href="mailto:{{$contact->email}}">{{$contact->email}}</a>
                <a href="mailto:{{$contact->email_2}}">{{$contact->email_2}}</a>
                <a href="mailto:{{$contact->email_3}}">{{$contact->email_3}}</a>
            </div>
            <div class="contact-card">
                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                <h3>Visit Us</h3>
                <p>{{$contact->office_location}}</p>
            </div>
            <div class="contact-card">
                <div class="icon"><i class="fas fa-envelope"></i></div>
                <h3>Postal Address</h3>
                <p>{{$contact->postal_address}}</p>
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section class="contact-form-section">
        <div class="contact-form-grid">
            <div class="form-copy">
                <span class="eyebrow">Get In Touch</span>
                <h2>Send Us A Message</h2>
                <p>Have a shipment to plan or a question about customs clearance? Fill out the form and our team will get back to you within one business day.</p>

                <form class="contact-form" onsubmit="return false;">
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" name="fullName" placeholder="Your full name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="youremail@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="+2547 xxx xxx">
                    </div>
                    <div class="form-group">
                        <label for="service">Service Needed</label>
                        <select id="service" name="service">
                            <option value="">Select a service</option>
                            <option value="sea">Sea Freight</option>
                            <option value="air">Air Freight</option>
                            <option value="customs">Customs Clearance</option>
                            <option value="warehousing">Warehousing</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group full">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Tell us how we can help you..." required></textarea>
                    </div>
                    <button type="submit" class="cta-button">Send Message</button>
                </form>
            </div>

            <div class="sidebar-card">
                <h3>Working Hours</h3>
                <p>Available at a time convenient for you</p>
                <ul class="sidebar-hours">
                    <li><span>Monday - Friday</span><span>9:00 AM - 6:00 PM</span></li>
                    <li><span>Saturday</span><span>9:00 AM - 2:00 PM</span></li>
                    <li><span>Sunday</span><span>Closed</span></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Google Map Section -->
    <section class="map-section">
       <iframe
            src="https://maps.google.com/maps?q=-4.062821921188377,39.672972248022745&t=&z=15&ie=UTF8&output=embed"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="Greenline Holdings location map">
        </iframe>
    </section>
</div>
