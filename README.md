

## About Occupation Project

This is a Laravel Livewire based project to manage and track occupation safety issues at construction sites, with the following modules

- User Authentication
- User Profile Management
- Priviledged and Restricted Access to authenticated users
- Articles (posts) Management (CRUD)
- Image Handling
- Searching Functionality based on Different Creteria
Laravel is accessible, powerful, and provides tools required for large, robust applications.
- Notification System

## User functions

## Project Admin
-✅creates a project with
	- project title
	- project description
	- project start date
	- project end date
-✅Adds contractor(s) to the project with
	- contractor's name
	- contact address
	- contact phone no.s
	- website (optional)
	- email (optional)

-✅Adds safety officer for each Contractor
-
✅Creates details to any remedial work added to a project (e.g. Briefing of safety officer who stated that his role was not properly stated to him) stating
	- date
	- challenge addressed (to be selected from a list of outstanding risks auto generated from safety officers' responses to risk compliance)

❇️ Project Admin can
-✅ view all projects and the following associated details
	- project's contractors, safety officers and other workers
	- Nature of Job (work at height, lifting operations etc)
	- safety meetings for each project (stating date of meeting, venue of meeting, who was present, risks not complied to for each nature of job, % compliance)
	- project images
- ✅send messages to safety officers on any information requiring further probing
- ✅can view
	- reported accidents and associated project details
	- near misses and associated project details
	- summary reports on accidents and near misses for selected periods
	- view projects with outstanding risks
- ✅Receive notifications on
	- uploaded safety meetings
	- reported accidents
	- reported near misses
	- safety officers who activated their accounts
	- safety officers who added workers to the system
	- contractor who does not have right tools for the job
	- contractor who does not have protective equipment for the job
	- safety officer whose role was not explained to him
	- safety officer to whom the procedure and work permit was not explained to him
	-safety officer who stated  that he cannot  perform his role
	- replies from safety officer on any enquiries


## Safety Officer
- ✅creates safety meeting 'minutes' for an associated project with
	- date of meeting
	- venue of meeting
	- attendees (marked present from the list of the contractor's workers)
	- Nature of Job(s): (work at height, lifting operations etc)
	- site images
	- answer yes/no auto generated risk assessment questions for each nature of job
	- the system then highlights to the project admin risks not complied to from these responses
	- system calculates compliance % from these responses
-✅State if he has the right tools for the job
-✅state if he has protective equipment for the job
-✅state if his role was explained to him
-✅state if the procedure and work permit was explained to him
-✅state if he can perform his role
-✅Add workers for a particular project as follows:
	- first name
	- surname
	- national id number
	- sex
	- contact home address
	- contact email (optional)
	- contact cellphone
	- job title
(NB: This information will be used amongst other things to mark the attendance register of those present in the safety meetings)
-✅Report accidents with the following details:
	- date of accident
	- approximate time
	- location
	- who was involved
	- possible causes of the accident
	- number of people injured
	- names of people injured (optional)
	- number of deaths
	- names of people who died (optional)
	- damage to machinery, equipment and structures
	- action that was taken
	- outstanding action to be taken
- ✅Report near misses with the following details:
	- date of near miss
	- approximate time
	- location
	- who was involved
	- possible causes
	- action that was taken
	- outstanding action to be taken
- ✅Respond to messages from project admin on any areas needing clarification
- ✅Safety officer can view
	- projects that his / her company is contracted to and associated risks, compliance levels
	- can edit his / her safety meeting minutes before finally sending
	- can view and edit workers of the contractor that he uploaded for

✅Safety officer can receive notifications on 
- Projects that his company (contractor) has been assigned to
- messages from the project admin requiring some clarifications