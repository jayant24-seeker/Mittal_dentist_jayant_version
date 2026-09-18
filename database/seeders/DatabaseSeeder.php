<?php

namespace Database\Seeders;

use App\Models\GalleryItem;
use App\Models\Post;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Transformation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seeds real content pulled from the live mittaldentalclinic.com site,
     * so the scaffold is browsable end-to-end rather than empty.
     * Services marked [CONTENT PENDING MIGRATION] still need their full
     * body copied over from the corresponding legacy page in Phase 1.
     */
    public function run(): void
    {
        TeamMember::create([
            'slug' => 'dr-sankalp-mittal',
            'name' => 'Dr. Sankalp Mittal',
            'title' => 'Oral & Maxillofacial Surgeon and Implantologist',
            'credentials' => 'B.D.S (S.M.S), M.D.S (Manipal), MOMSRCPS (Royal College of Physicians & Surgeons, Glasgow, U.K.), FIAOMS (U.S.A), MISOI, MAOMSI, MAOI, MIDA — Diplomate of International Congress of Oral Implantologists, USA',
            'bio' => '<p>Dr. Sankalp Mittal is a Dentist, Oral and Maxillofacial Surgeon and Implantologist with over 20 years of experience. He practices at Mittal Dental Clinic in Nirman Nagar, Jaipur.</p><p>He completed his BDS from Sawai Mansingh Medical College, Jaipur (SMS College) in 2000 and his MDS in Oral & Maxillofacial Surgery from Manipal College of Dental Sciences, Mangalore in 2004.</p>',
            'sort_order' => 1,
        ]);

        TeamMember::create([
            'slug' => 'dr-preeti-mittal',
            'name' => 'Dr. Preeti Mittal',
            'title' => 'Dental Surgeon',
            'credentials' => 'B.D.S — Member, Indian Dental Association; Member, Academy of Oral Implantology; Member, Association for Clinical Implant Dentistry',
            'bio' => '<p>Dr. Preeti Mittal graduated from SMS Medical College, Jaipur in 2001 and completed her internship at the Dental College of Manipal, Karnataka.</p><p>She established Mittal Dental Clinic in 2004 as Principal Dental Surgeon and has run the clinic with her colleagues ever since, substantiating the worth of every procedure performed here. She underwent extensive orthodontics training and is a leading orthodontic treatment provider in the state — a pioneer in digital orthodontic treatment using a 3Shape intraoral scanner and digitally made aligners.</p>',
            'sort_order' => 2,
        ]);

        $services = [
            [
                'slug' => 'dental-implant',
                'title' => 'Dental Implant',
                'summary' => 'Replacement tooth roots that look, feel and function like natural teeth.',
                'body' => '<p>Dental implants are replacement tooth roots. Implants provide a strong foundation for fixed or removable replacement teeth that are made to match your natural teeth.</p>'
                    .'<h2>Advantages of Dental Implants</h2><ul>'
                    .'<li>Improved appearance — implants look and feel like your own teeth and fuse with bone to become permanent.</li>'
                    .'<li>Improved speech — no slipping teeth to cause mumbling, unlike poor-fitting dentures.</li>'
                    .'<li>Improved comfort — implants eliminate the discomfort of removable dentures.</li>'
                    .'<li>Easier eating — function like your own teeth so you can eat with confidence.</li>'
                    .'<li>Improved oral health — nearby teeth are not altered to support the implant.</li>'
                    .'<li>Durability — with good care, many implants last a lifetime.</li>'
                    .'</ul>'
                    .'<h2>How Successful Are Dental Implants?</h2><p>Success rates vary depending on placement in the jaw, but in general dental implants have a success rate of up to 98%.</p>',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'slug' => 'basal-implant',
                'title' => 'Basal Implant',
                'summary' => 'A graft-less implantation method for patients with insufficient bone height.',
                'body' => '<p>A revolutionary method for dental implantation where there is no need for bone augmentation even in the most difficult cases. Basal implants are made of biocompatible titanium alloy, with implant and abutment monolithically connected as one single unit.</p>'
                    .'<h2>Benefits</h2><ul>'
                    .'<li>Indicated for almost all patients, even those with no remaining teeth.</li>'
                    .'<li>Can be placed with minimal vertical bone height, provided there is enough horizontal bone.</li>'
                    .'<li>Placed in a single visit — less traumatic than crest/axial implants.</li>'
                    .'<li>Can immediately anchor dentures, restoring chewing function right away.</li>'
                    .'</ul>',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'slug' => 'zygoma-implant',
                'title' => 'Zygoma Implant',
                'summary' => 'Graft-less upper jaw implants anchored in the cheekbone for immediate results.',
                'body' => '<p>A graft-less technique that uses the cheekbone (zygoma bone) to anchor longer implants for upper jaw restorations, avoiding hip or other bone grafts entirely.</p>'
                    .'<h2>Advantages</h2><ul>'
                    .'<li>A fixed row of teeth within 72 hours, instead of up to 6 months.</li>'
                    .'<li>No need for hip or bone graft.</li>'
                    .'<li>Significantly less discomfort.</li>'
                    .'<li>Immediate ability to bite and chew normally.</li>'
                    .'</ul>'
                    .'<h2>Who Can Benefit?</h2><p>Appropriate for anyone with missing or shaky upper-jaw teeth, insufficient bone for regular implants, or those currently wearing complete dentures — suitable for all age groups except children.</p>',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'slug' => 'root-canals',
                'title' => 'Root Canal Treatment',
                'summary' => 'Save infected or badly decayed teeth with modern, low-pain RCT.',
                'body' => '<p>[CONTENT PENDING MIGRATION] — Full copy to be migrated from the legacy /root-canals/ page during Phase 1 content migration.</p>',
                'sort_order' => 4,
            ],
            [
                'slug' => 'dental-brace',
                'title' => 'Dental Braces & Orthodontics',
                'summary' => 'Digital orthodontics and aligners for a straighter, confident smile.',
                'body' => '<p>[CONTENT PENDING MIGRATION] — Full copy to be migrated from the legacy /dental-brace/ page during Phase 1 content migration.</p>',
                'sort_order' => 5,
            ],
            [
                'slug' => 'dental-crowns',
                'title' => 'Dental Crowns',
                'summary' => 'Durable, natural-looking crowns to restore damaged teeth.',
                'body' => '<p>[CONTENT PENDING MIGRATION] — Full copy to be migrated from the legacy /dental-crowns/ page during Phase 1 content migration.</p>',
                'sort_order' => 6,
            ],
            [
                'slug' => 'dental-bonding',
                'title' => 'Dental Bonding',
                'summary' => 'Cosmetic repair for chipped, cracked or discoloured teeth.',
                'body' => '<p>[CONTENT PENDING MIGRATION] — Full copy to be migrated from the legacy /dental-bonding/ page during Phase 1 content migration.</p>',
                'sort_order' => 7,
            ],
            [
                'slug' => 'gum-surgery',
                'title' => 'Gum Surgery',
                'summary' => 'Periodontal treatment for healthy, disease-free gums.',
                'body' => '<p>[CONTENT PENDING MIGRATION] — Full copy to be migrated from the legacy /gum-surgery/ page during Phase 1 content migration.</p>',
                'sort_order' => 8,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        GalleryItem::create([
            'title' => "Dr. Sankalp Mittal Receives Letter of Appreciation from the Hon'ble Governor of Rajasthan",
            'description' => 'Professor and Superintendent, RUHS College of Dental Sciences, Jaipur, honoured for transformative leadership in dental education.',
            'image' => 'https://mittaldentalclinic.com/wp-content/uploads/2026/09/governor-appriciation.jpeg',
            'category' => 'achievement',
            'person_name' => 'Shri Haribhau Bagde, Governor of Rajasthan',
            'sort_order' => 1,
        ]);

        GalleryItem::create([
            'title' => "Providing Dental Care to the Hon'ble Governor of Rajasthan",
            'description' => 'Routine check-up conducted at Government Dental College, Jaipur.',
            'image' => 'https://mittaldentalclinic.com/wp-content/uploads/2026/09/governor-photo.jpeg',
            'category' => 'achievement',
            'person_name' => 'Shri Haribhau Bagde, Governor of Rajasthan',
            'sort_order' => 2,
        ]);

        $placeholderRecognitions = [
            'Felicitated by Former CM of Rajasthan, Shri Ashok Gehlot',
            'With Pratibha Patil, Former President of India',
            'With Vasundhara Raje, Former Chief Minister of Rajasthan',
            'Blessed by Hon\'ble Governor Shri Kalraj Mishra at the clinic',
            'With Shri Rajendra Singh Rathore, Former Health Minister of Rajasthan',
            'With Kalicharan Saraf Ji, Former Health Minister',
        ];

        foreach ($placeholderRecognitions as $i => $title) {
            GalleryItem::create([
                'title' => $title,
                'image' => 'https://placehold.co/800x600/fce7f0/e30569?text=Photo+'.($i + 3),
                'category' => 'achievement',
                'sort_order' => $i + 3,
            ]);
        }

        Post::create([
            'slug' => 'full-mouth-dental-implants-in-jaipur-how-advanced-implant-treatment-changed-a-19-year-olds-life',
            'title' => "Full Mouth Dental Implants in Jaipur: How Advanced Implant Treatment Changed a 19-Year-Old's Life",
            'excerpt' => 'A real smile transformation story by Mittal Dental Clinic — imagine being just 19 and afraid to smile, laugh or speak confidently.',
            'body' => '<p>[CONTENT PENDING MIGRATION] — Full copy to be migrated from the legacy blog post during Phase 1 content migration.</p>',
            'category' => 'Dental Case Reports',
            'published_at' => '2026-05-21',
        ]);

        Post::create([
            'slug' => 'dynamic-navigation-dental-implants-in-jaipur-the-future-of-painless-precise-implant-surgery',
            'title' => 'Dynamic Navigation Dental Implants in Jaipur: The Future of Painless & Precise Implant Surgery',
            'excerpt' => 'Experience X-Guide technology at Mittal Dental Clinic — GPS-like precision for safer, more confident implant surgery.',
            'body' => '<p>[CONTENT PENDING MIGRATION] — Full copy to be migrated from the legacy blog post during Phase 1 content migration.</p>',
            'category' => 'Dental and Oral Health',
            'published_at' => '2026-05-20',
        ]);

        Post::create([
            'slug' => 'how-to-stop-toothache-fast-at-home-expert-advice-from-the-best-dental-clinic-in-jaipur',
            'title' => 'How to Stop Toothache Fast at Home: Expert Advice from the Best Dental Clinic in Jaipur',
            'excerpt' => 'A sudden toothache can disrupt your entire day. Here\'s expert advice for fast relief.',
            'body' => '<p>[CONTENT PENDING MIGRATION] — Full copy to be migrated from the legacy blog post during Phase 1 content migration.</p>',
            'category' => 'Latest News',
            'published_at' => '2026-05-20',
        ]);

        // Real photos go in public/images/transformations/ using the filenames
        // below — drop them in and these records pick them up automatically.
        // Case 1 shows the patient's face, so it's held back (consent_confirmed
        // = false) until the clinic confirms written consent to publish it.
        Transformation::create([
            'title' => 'Full Mouth Rehabilitation',
            'description' => 'Severely decayed, broken teeth restored to a natural, healthy smile.',
            'before_image' => '/images/transformations/case-1-before.jpg',
            'after_image' => '/images/transformations/case-1-after.jpg',
            'shows_face' => true,
            'consent_confirmed' => false,
            'sort_order' => 1,
        ]);

        Transformation::create([
            'title' => 'Anterior Smile Makeover',
            'description' => 'Decayed and misaligned front teeth rebuilt with natural-looking crowns.',
            'before_image' => '/images/transformations/case-2-before.jpg',
            'after_image' => '/images/transformations/case-2-after.jpg',
            'shows_face' => false,
            'consent_confirmed' => false,
            'sort_order' => 2,
        ]);
    }
}
