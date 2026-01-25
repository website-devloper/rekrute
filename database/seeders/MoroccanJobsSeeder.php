<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\employer;
use App\Models\Job;
use Carbon\Carbon;

class MoroccanJobsSeeder extends Seeder
{
    /**
     * Run the database seeds - Moroccan Companies & Jobs
     */
    public function run(): void
    {
        // Real Moroccan Companies Data
        $moroccanCompanies = [
            [
                'name' => 'OCP Group',
                'email_adress' => 'careers@ocpgroup.ma',
                'password' => bcrypt('password'),
                'logo_url' => null,
                'website_url' => 'https://www.ocpgroup.ma',
                'service' => 'Mining & Phosphates',
                'city' => 'Casablanca',
                'country' => 'Maroc',
                'type' => 'Enterprise',
            ],
            [
                'name' => 'Attijariwafa Bank',
                'email_adress' => 'rh@attijariwafabank.com',
                'password' => bcrypt('password'),
                'logo_url' => null,
                'website_url' => 'https://www.attijariwafabank.com',
                'service' => 'Banking & Finance',
                'city' => 'Casablanca',
                'country' => 'Maroc',
                'type' => 'Bank',
            ],
            [
                'name' => 'Maroc Telecom',
                'email_adress' => 'recrutement@iam.ma',
                'password' => bcrypt('password'),
                'logo_url' => null,
                'website_url' => 'https://www.iam.ma',
                'service' => 'Telecommunications',
                'city' => 'Rabat',
                'country' => 'Maroc',
                'type' => 'Telecom',
            ],
            [
                'name' => 'BMCE Bank',
                'email_adress' => 'jobs@bmcebank.ma',
                'password' => bcrypt('password'),
                'logo_url' => null,
                'website_url' => 'https://www.bmcebank.ma',
                'service' => 'Banking & Finance',
                'city' => 'Casablanca',
                'country' => 'Maroc',
                'type' => 'Bank',
            ],
            [
                'name' => 'Royal Air Maroc',
                'email_adress' => 'careers@royalairmaroc.com',
                'password' => bcrypt('password'),
                'logo_url' => null,
                'website_url' => 'https://www.royalairmaroc.com',
                'service' => 'Aviation',
                'city' => 'Casablanca',
                'country' => 'Maroc',
                'type' => 'Airline',
            ],
            [
                'name' => 'Capgemini Maroc',
                'email_adress' => 'careers.morocco@capgemini.com',
                'password' => bcrypt('password'),
                'logo_url' => null,
                'website_url' => 'https://www.capgemini.com/ma-fr',
                'service' => 'IT Consulting',
                'city' => 'Casablanca',
                'country' => 'Maroc',
                'type' => 'IT Services',
            ],
            [
                'name' => 'Accenture Maroc',
                'email_adress' => 'morocco@accenture.com',
                'password' => bcrypt('password'),
                'logo_url' => null,
                'website_url' => 'https://www.accenture.com',
                'service' => 'IT Consulting',
                'city' => 'Rabat',
                'country' => 'Maroc',
                'type' => 'IT Services',
            ],
            [
                'name' => 'Majorel Morocco',
                'email_adress' => 'recruitment@majorel.com',
                'password' => bcrypt('password'),
                'logo_url' => null,
                'website_url' => 'https://www.majorel.com',
                'service' => 'Customer Experience',
                'city' => 'Casablanca',
                'country' => 'Maroc',
                'type' => 'Outsourcing',
            ],
            [
                'name' => 'Safran Morocco',
                'email_adress' => 'hr.morocco@safrangroup.com',
                'password' => bcrypt('password'),
                'logo_url' => null,
                'website_url' => 'https://www.safran-group.com',
                'service' => 'Aerospace',
                'city' => 'Casablanca',
                'country' => 'Maroc',
                'type' => 'Industry',
            ],
            [
                'name' => 'Société Générale Maroc',
                'email_adress' => 'recrutement@sgmaroc.com',
                'password' => bcrypt('password'),
                'logo_url' => null,
                'website_url' => 'https://www.societegenerale.ma',
                'service' => 'Banking & Finance',
                'city' => 'Casablanca',
                'country' => 'Maroc',
                'type' => 'Bank',
            ],
        ];

        // Moroccan Cities
        $moroccanCities = [
            'Casablanca', 'Rabat', 'Marrakech', 'Fès', 'Tanger', 
            'Agadir', 'Meknès', 'Oujda', 'Kenitra', 'Tétouan'
        ];

        // Create companies and their jobs
        foreach ($moroccanCompanies as $companyData) {
            $company = employer::create($companyData);

            // Generate 3-5 jobs per company
            $jobCount = rand(3, 5);
            
            for ($i = 0; $i < $jobCount; $i++) {
                $this->createJobForCompany($company, $moroccanCities);
            }
        }

        // Add some French and USA based jobs
        $this->createInternationalJobs();
    }

    private function createJobForCompany($company, $moroccanCities)
    {
        $jobsByIndustry = [
            'Banking & Finance' => [
                ['title' => 'Chargé de Clientèle Entreprise', 'category' => 'Finance', 'type' => 'Full Time', 'exp' => 'Mid Level', 'min' => 8000, 'max' => 15000],
                ['title' => 'Analyste Crédit', 'category' => 'Finance', 'type' => 'Full Time', 'exp' => 'Entry Level', 'min' => 6000, 'max' => 10000],
                ['title' => 'Gestionnaire de Portefeuille', 'category' => 'Finance', 'type' => 'Full Time', 'exp' => 'Senior', 'min' => 12000, 'max' => 22000],
                ['title' => 'Conseiller Bancaire', 'category' => 'Finance', 'type' => 'Full Time', 'exp' => 'Entry Level', 'min' => 5000, 'max' => 8000],
            ],
            'IT Consulting' => [
                ['title' => 'Développeur Full Stack', 'category' => 'IT', 'type' => 'Full Time', 'exp' => 'Mid Level', 'min' => 10000, 'max' => 18000],
                ['title' => 'Data Engineer', 'category' => 'IT', 'type' => 'Full Time', 'exp' => 'Senior', 'min' => 15000, 'max' => 25000],
                ['title' => 'Consultant SAP', 'category' => 'IT', 'type' => 'Full Time', 'exp' => 'Senior', 'min' => 14000, 'max' => 24000],
                ['title' => 'DevOps Engineer', 'category' => 'IT', 'type' => 'Full Time', 'exp' => 'Mid Level', 'min' => 12000, 'max' => 20000],
                ['title' => 'Business Analyst', 'category' => 'IT', 'type' => 'Full Time', 'exp' => 'Mid Level', 'min' => 9000, 'max' => 16000],
            ],
            'Telecommunications' => [
                ['title' => 'Ingénieur Réseau', 'category' => 'Engineering', 'type' => 'Full Time', 'exp' => 'Mid Level', 'min' => 10000, 'max' => 17000],
                ['title' => 'Chef de Projet Digital', 'category' => 'IT', 'type' => 'Full Time', 'exp' => 'Senior', 'min' => 13000, 'max' => 22000],
                ['title' => 'Technicien Support Client', 'category' => 'IT', 'type' => 'Full Time', 'exp' => 'Entry Level', 'min' => 5000, 'max' => 8000],
            ],
            'Mining & Phosphates' => [
                ['title' => 'Ingénieur de Production', 'category' => 'Engineering', 'type' => 'Full Time', 'exp' => 'Mid Level', 'min' => 11000, 'max' => 19000],
                ['title' => 'Responsable HSE', 'category' => 'Engineering', 'type' => 'Full Time', 'exp' => 'Senior', 'min' => 13000, 'max' => 21000],
                ['title' => 'Géologue', 'category' => 'Engineering', 'type' => 'Full Time', 'exp' => 'Mid Level', 'min' => 10000, 'max' => 17000],
            ],
            'Aviation' => [
                ['title' => 'Pilote de Ligne', 'category' => 'Aviation', 'type' => 'Full Time', 'exp' => 'Senior', 'min' => 25000, 'max' => 45000],
                ['title' => 'Agent de Bord', 'category' => 'Aviation', 'type' => 'Full Time', 'exp' => 'Entry Level', 'min' => 6000, 'max' => 10000],
                ['title' => 'Technicien Aéronautique', 'category' => 'Engineering', 'type' => 'Full Time', 'exp' => 'Mid Level', 'min' => 9000, 'max' => 15000],
            ],
            'Customer Experience' => [
                ['title' => 'Conseiller Client (Francophone)', 'category' => 'Sales', 'type' => 'Full Time', 'exp' => 'Entry Level', 'min' => 4500, 'max' => 7000],
                ['title' => 'Team Leader Support Client', 'category' => 'Sales', 'type' => 'Full Time', 'exp' => 'Mid Level', 'min' => 8000, 'max' => 13000],
                ['title' => 'Quality Analyst', 'category' => 'Sales', 'type' => 'Full Time', 'exp' => 'Mid Level', 'min' => 7000, 'max' => 11000],
            ],
            'Aerospace' => [
                ['title' => 'Ingénieur Qualité Aéronautique', 'category' => 'Engineering', 'type' => 'Full Time', 'exp' => 'Senior', 'min' => 14000, 'max' => 23000],
                ['title' => 'Technicien d\'Assemblage', 'category' => 'Engineering', 'type' => 'Full Time', 'exp' => 'Entry Level', 'min' => 6000, 'max' => 9000],
                ['title' => 'Responsable Production', 'category' => 'Engineering', 'type' => 'Full Time', 'exp' => 'Senior', 'min' => 15000, 'max' => 25000],
            ],
        ];

        // Use 'service' column to get the industry
        $jobs = $jobsByIndustry[$company->service] ?? $jobsByIndustry['IT Consulting'];
        $randomJob = $jobs[array_rand($jobs)];

        Job::create([
            'title' => $randomJob['title'],
            'employer_id' => $company->id,
            'job_type' => $randomJob['type'],
            'job_category' => $randomJob['category'],
            'experience' => $randomJob['exp'],
            'minimum_salary' => $randomJob['min'],
            'maximum_salary' => $randomJob['max'],
            'city' => $moroccanCities[array_rand($moroccanCities)],
            'country' => 'Maroc',
            'description' => $this->generateJobDescription($randomJob['title'], $company->name),
            'job_responsabilities' => $this->generateResponsibilities($randomJob['title']),
            'requirements' => $this->generateRequirements($randomJob['exp']),
            'created_at' => Carbon::now()->subDays(rand(1, 30)),
            'updated_at' => Carbon::now()->subDays(rand(1, 30)),
        ]);
    }

    private function createInternationalJobs()
    {
        // French Companies
        $frenchCompanies = [
            ['name' => 'BNP Paribas France', 'city' => 'Paris', 'service' => 'Banking'],
            ['name' => 'Orange France', 'city' => 'Lyon', 'service' => 'Telecommunications'],
            ['name' => 'Thales France', 'city' => 'Toulouse', 'service' => 'Aerospace'],
        ];

        foreach ($frenchCompanies as $compData) {
            $company = employer::create([
                'name' => $compData['name'],
                'email_adress' => strtolower(str_replace(' ', '.', $compData['name'])) . '@example.fr',
                'password' => bcrypt('password'),
                'city' => $compData['city'],
                'country' => 'France',
                'service' => $compData['service'],
            ]);

            // Create 2 jobs
            Job::create([
                'title' => 'Développeur Full Stack Senior',
                'employer_id' => $company->id,
                'job_type' => 'Full Time',
                'job_category' => 'IT',
                'experience' => 'Senior',
                'minimum_salary' => 45000,
                'maximum_salary' => 65000,
                'city' => $compData['city'],
                'country' => 'France',
                'description' => 'Rejoignez une équipe dynamique à ' . $compData['city'],
                'job_responsabilities' => 'Développement applications web, Architecture solutions, Mentorat équipe',
                'requirements' => 'Bac+5, 5+ ans expérience, React/Node.js',
                'created_at' => Carbon::now()->subDays(rand(1, 15)),
            ]);
        }

        // USA Companies
        $usaCompanies = [
            ['name' => 'Microsoft USA', 'city' => 'Seattle', 'service' => 'Technology'],
            ['name' => 'Google USA', 'city' => 'San Francisco', 'service' => 'Technology'],
        ];

        foreach ($usaCompanies as $compData) {
            $company = employer::create([
                'name' => $compData['name'],
                'email_adress' => strtolower(str_replace(' ', '.', $compData['name'])) . '@example.com',
                'password' => bcrypt('password'),
                'city' => $compData['city'],
                'country' => 'USA',
                'service' => $compData['service'],
            ]);

            Job::create([
                'title' => 'Senior Software Engineer',
                'employer_id' => $company->id,
                'job_type' => 'Full Time',
                'job_category' => 'IT',
                'experience' => 'Senior',
                'minimum_salary' => 120000,
                'maximum_salary' => 180000,
                'city' => $compData['city'],
                'country' => 'USA',
                'description' => 'Join our world-class engineering team in ' . $compData['city'],
                'job_responsabilities' => 'Build scalable systems, Lead technical initiatives, Collaborate with teams',
                'requirements' => 'BS/MS in Computer Science, 5+ years experience, Strong coding skills',
                'created_at' => Carbon::now()->subDays(rand(1, 10)),
            ]);
        }
    }

    private function generateJobDescription($title, $companyName)
    {
        return "{$companyName} recrute un(e) {$title}. Nous recherchons un professionnel passionné et motivé pour rejoindre notre équipe dynamique. Cette opportunité vous permettra de développer vos compétences dans un environnement stimulant tout en contribuant à la croissance de l'entreprise.\n\nNous offrons un package salarial compétitif en DH, des avantages sociaux attractifs et de réelles opportunités d'évolution de carrière.";
    }

    private function generateResponsibilities($title)
    {
        return "- Assurer les missions principales liées au poste de {$title}\n- Collaborer avec les équipes internes pour atteindre les objectifs\n- Participer à l'amélioration continue des processus\n- Respecter les standards de qualité et les délais\n- Contribuer au développement et à l'innovation";
    }

    private function generateRequirements($experience)
    {
        $requirements = [
            'Entry Level' => "- Diplôme Bac+3 minimum\n- Première expérience souhaitée\n- Maîtrise du français (obligatoire)\n- Anglais professionnel (un plus)\n- Esprit d'équipe et motivation",
            'Mid Level' => "- Diplôme Bac+5 ou équivalent\n- 3-5 ans d'expérience dans un poste similaire\n- Maîtrise du français et de l'anglais\n- Excellentes compétences en communication\n- Capacité d'analyse et de résolution de problèmes",
            'Senior' => "- Diplôme Bac+5 (Grande École/Université)\n- Minimum 5 ans d'expérience confirmée\n- Maîtrise parfaite du français et de l'anglais\n- Leadership et capacité à gérer des équipes\n- Vision stratégique et expertise métier",
            'Executive' => "- MBA ou équivalent\n- 10+ ans d'expérience dont 5 ans en management\n- Excellent niveau en français et anglais\n- Leadership exceptionnel\n- Compétences stratégiques avérées",
        ];

        return $requirements[$experience] ?? $requirements['Mid Level'];
    }
}
