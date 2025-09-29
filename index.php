<?php get_header(); ?>

<?php get_template_part('sidebar'); ?>

<?php get_template_part('mobile-sidebar'); ?>

<div class="section-content">
    <div class="responsive-header d-lg-none">
        <button class="btn btn-primary mobile-toggle d-lg-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">
            <img src="<?php echo get_template_directory_uri(); ?>/src/img/menu.svg" alt="menu">
        </button>
    </div>
    
    <div class="experience">
        <div class="title">
            <h2>Experience</h2>
        </div>
        <ul class="experience-list">
            <?php
            $experiences = get_theme_mod('experiences', array(
                array(
                    'company' => 'Netbee',
                    'position' => 'Front-End Developer',
                    'period' => 'Present',
                    'location' => 'Iran, Esfahan',
                    'logo' => 'netbee.svg'
                ),
                array(
                    'company' => 'Self-Employed',
                    'position' => 'Front-End Developer (Freelance)',
                    'period' => '2021 - 2023',
                    'location' => 'Remote',
                    'logo' => 'freelance.png'
                )
            ));
            
            foreach($experiences as $index => $exp): ?>
            <li class="<?php echo $index === 0 ? 'present' : ''; ?>">
                <div class="development-info">
                    <img src="<?php echo get_template_directory_uri(); ?>/src/img/<?php echo $exp['logo']; ?>" alt="<?php echo $exp['company']; ?>">
                    <div class="info">
                        <p><?php echo $exp['position']; ?></p>
                        <h4><?php echo $exp['company']; ?></h4>
                    </div>
                </div>
                <div class="experience-info">
                    <span class="experience-status"><?php echo $exp['period']; ?></span>
                    <div class="experience-location">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/img/location-2.svg" alt="location">
                        <span><?php echo $exp['location']; ?></span>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <div class="latest-projects">
        <div class="title">
            <h2>Latest projects</h2>
        </div>
        <div class="project-slider">
            <ul>
                <?php
                $projects = get_theme_mod('projects', array(
                    array(
                        'name' => 'Ticket Plus',
                        'description' => 'A ticket selling website. I was responsible for the front-end using HTML and Tailwind.',
                        'url' => 'https://ticketplus.ir',
                        'logo' => 'ticket-plus.svg'
                    ),
                    array(
                        'name' => 'Bagh Ketab Tehran',
                        'description' => 'A website for Bagh Ketab Tehran, developed with React. I worked on the front-end part of the project.',
                        'url' => '#',
                        'logo' => 'bagheketab.svg'
                    ),
                    array(
                        'name' => 'Netbee Market',
                        'description' => 'A full interactive e-commerce platform with dynamic products. Worked with APIs for data handling and integrated POS payment through WebSocket connection.',
                        'url' => '#',
                        'logo' => 'netbee-market.svg'
                    ),
                    array(
                        'name' => 'Pay with QR',
                        'description' => 'A React-based payment system that connects with a barcode scanner to read payment data and sends it to the POS terminal via WebSocket for card transactions.',
                        'url' => '#',
                        'logo' => 'pay-with-qr.svg'
                    ),
                    array(
                        'name' => 'Digisun Jobs',
                        'description' => 'A job listing website built with a custom-coded WordPress theme. I handled the front-end development and theme customization.',
                        'url' => '#',
                        'logo' => 'digisun-jobs.svg'
                    )
                ));
                
                foreach($projects as $project): ?>
                <li>
                    <article>
                        <img src="<?php echo get_template_directory_uri(); ?>/src/img/project/<?php echo $project['logo']; ?>" alt="<?php echo $project['name']; ?> project">
                        <div class="project-info">
                            <h3><a href="<?php echo $project['url']; ?>" target="_blank"><?php echo $project['name']; ?></a></h3>
                            <p><?php echo $project['description']; ?></p>
                            <?php if($project['url'] !== '#'): ?>
                            <a href="<?php echo $project['url']; ?>" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/src/img/link.svg" alt="link">
                                <span><?php echo parse_url($project['url'], PHP_URL_HOST); ?></span>
                            </a>
                            <?php endif; ?>
                        </div>
                    </article>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    
    <div class="skills">
        <div class="title">
            <h2>Skills</h2>
        </div>
        <ul class="skills-list">
            <li class="skill">
                <div class="title-skill">
                    <h4>Developer</h4>
                </div>
                <div class="skills-container">
                    <ul>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/logos/React-Dark.svg" alt="react">
                            <p>React</p>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/logos/NextJS-Dark.svg" alt="NextJS">
                            <p>Next</p>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/logos/JavaScript.svg" alt="JavaScript">
                            <p>JavaScript</p>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/logos/TypeScript.svg" alt="TypeScript">
                            <p>TypeScript</p>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/logos/TailwindCSS-Dark.svg" alt="TailwindCSS">
                            <p>Tailwind</p>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/logos/Sass.svg" alt="Sass">
                            <p>Sass</p>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/logos/Bootstrap.svg" alt="Bootstrap">
                            <p>Bootstrap</p>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/logos/StyledComponents.svg" alt="StyledComponents">
                            <p>Styled Components</p>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/logos/Vite-Dark.svg" alt="Vite">
                            <p>Vite</p>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/logos/Git.svg" alt="Git">
                            <p>Git</p>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/logos/MongoDB.svg" alt="MongoDB">
                            <p>Mongo</p>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="skill">
                <div class="title-skill">
                    <h4>Tools</h4>
                </div>
                <div class="skills-container">
                    <ul>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/logos/Postman.svg" alt="Postman">
                            <p>Postman</p>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/logos/Pnpm-Dark.svg" alt="Pnpm-Dark">
                            <p>Pnpm</p>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/logos/Figma-Dark.svg" alt="Figma-Dark">
                            <p>Figma</p>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/logos/XD.svg" alt="XD">
                            <p>Xd</p>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>

<?php get_footer(); ?>