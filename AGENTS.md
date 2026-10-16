# KeyKeep Project Guidelines

## 1. Project Overview
KeyKeep is a web application for managing personal passwords. It consists of:
- **Backend**: Laravel API (PHP 8.5) with JWT authentication
- **Frontend**: Next.js 16.3.6 React app with Material Kit React UI kit
- **Purpose**: Free tool to organize personal passwords (currently in development/testing)

**Security Notice**: 
- Do not use for critical credentials (banking, primary email)
- Prefer local environment or trusted networks
- Avoid exposing API publicly until advanced security testing

## 2. Architecture

### Backend (Laravel)
- **Framework**: Laravel 13.17 with PHP 8.5
- **Authentication**: JWT via `tymon/jwt-auth` package
- **Database**: MySQL (configured), migrations for users, credentials, tags, and related tables
- **Structure**:
  - `app/Http/Controllers/Access/AccessController.php` - Handles `/api/login` endpoint
  - `app/Http/Controllers/Credential/CredentialController.php` - Manages credential operations
  - `app/Http/Controllers/Credential/TagController.php` - Manages tag operations
  - `app/Models/Access/User.php` - Extends Authenticatable, implements JWTSubject
  - `app/Models/Credential/Credential.php` - Credential model with relationships
  - `app/Models/Credential/Tag.php` - Tag model with relationships
  - `app/Services/Access/UserService.php` - Handles login logic
  - `app/Services/Credential/CredentialService.php` - Handles credential business logic
  - `app/Services/Credential/TagService.php` - Handles tag business logic
  - `app/Services/Service.php` - Base service class with common functionality
  - `app/Repositories/Credential/CredentialRepository.php` - Credential data access
  - `app/Repositories/Credential/TagRepository.php` - Tag data access
  - `app/Repositories/Repository.php` - Base repository class
  - `database/migrations/` - Users, credentials, tags, credential_tags, password_reset_tokens, sessions tables
  - `app/Http/Requests/` - Form request validation classes
  - `app/Http/Resources/` - API response formatting resources
  - `config/jwt.php` - JWT configuration

### Frontend (Next.js)
- **Framework**: Next.js 16.3.6 with React 19
- **UI Library**: Material Kit React (Devias) with MUI v7
- **State Management**: React Context API (`user-context.tsx`)
- **Routing**: Next.js App Router
- **Key Files**:
  - `web/src/app/layout.tsx` - Root layout with providers
  - `web/src/contexts/user-context.tsx` - Auth state management
  - `web/src/lib/auth/client.ts` - Mock auth client (localStorage-based)
  - `web/src/app/auth/` - Sign-in, sign-up, reset-password pages
  - `web/src/app/dashboard/` - Protected dashboard route
  - `web/src/components/` - Reusable UI components

### Data Flow
1. Frontend collects login credentials
2. Sends POST to `/api/login` (Laravel backend)
3. Backend validates via `LoginRequest` and `UserService::login()`
4. Returns JWT token stored in localStorage
5. Frontend uses token for authenticated requests (currently mocked)
6. For credential operations, frontend sends requests to `/api/credentials/*` endpoints
7. Backend processes requests through Controllers → Services → Repositories → Models
8. Returns formatted JSON responses via Resource classes

## 3. Key Commands

### Backend (API)
Located in `/api` directory:
- `php artisan dev` - Start development server
- `php artisan test` - Run PHPUnit tests
- `vendor/bin/pint` - Run Laravel Pint formatter
- `phpstan analyse` - Run PHPStan type checking
- `php artisan route:list` - List all API routes
- `composer run dev` - Alternative dev command

### Frontend (Web)
Located in `/web` directory:
- `npm run dev` - Start Next.js development server (localhost:3000)
- `npm run build` - Build for production
- `npm run start` - Start production server
- `npm run lint` - Run ESLint
- `npm run lint:fix` - Fix ESLint issues
- `npm run typecheck` - Run TypeScript compiler (tsc --noEmit)
- `npm run format:write` - Format code with Prettier
- `npm run format:check` - Check formatting with Prettier

### Setup
- `composer install` - Install PHP dependencies
- `npm install` - Install JavaScript dependencies
- Copy `.env.example` to `.env` and generate key: `php artisan key:generate`
- Run migrations: `php artisan migrate`

## 4. Coding Conventions

### Backend (PHP/Laravel)
- **Language**: PHP 8.5+ with strict types
- **Style**: Laravel Pint formatter (PSR-12 compliant)
- **Imports**: 
  - Facades: `use Illuminate\Support\Facades\Schema;`
  - Models: `use App\Models\User;`
  - Services: `use App\Services\UserService;`
  - Requests: `use App\Http\Requests\Access\LoginRequest;`
- **Patterns**:
  - Constructor property promotion: `public function __construct(public User $model) {}`
  - Eloquent models with Fillable/Hidden attributes
  - Form Request validation (LoginRequest)
  - Service layer for business logic
  - JWT implementation via `Tymon\JWTAuth\Contracts\JWTSubject`
  - Repository pattern for data access
  - Resource classes for API response formatting
- **Documentation**: PHPDoc blocks for methods and classes
- **Rules**: Follow Laravel Boost guidelines in `api/CLAUDE.md`

### Frontend (TypeScript/React)
- **Language**: TypeScript 5.8.3
- **Style**: Prettier + ESLint with plugin configurations
- **Imports**:
  - React: `import * as React from 'react';`
  - Next.js: `import { Viewport } from 'next';`
  - Local: `@/types/user`, `@/lib/auth/client`
  - Components: Relative or alias imports
- **Patterns**:
  - `'use client'` directive for client components
  - React Context for state management (`UserProvider`)
  - Custom hooks (`use-user.ts`, `use-popover.ts`, etc.)
  - TypeScript interfaces for props and state
  - MUI components with sx prop for styling
  - Functional components with arrow function syntax
- **File Organization**:
  - `web/src/app/` - Next.js App Router (pages, layout)
  - `web/src/components/` - Reusable UI components (core, auth, dashboard)
  - `web/src/contexts/` - React Context providers
  - `web/src/hooks/` - Custom React hooks
  - `web/src/lib/` - Utility functions and services
  - `web/src/styles/` - CSS and theme files
  - `web/src/types/` - TypeScript type definitions

### General
- **Naming**: 
  - PHP: CamelCase for methods/properties, PascalCase for classes
  - TypeScript: CamelCase for variables/functions, PascalCase for components/types
  - Files: kebab-case for routes, PascalCase for components
- **Comments**: 
  - PHPDoc for backend methods/classes
  - JSDoc/TSDoc for frontend complex logic
  - Inline comments only for exceptionally complex logic

## 5. Things to Avoid

### Security-Sensitive Areas
- **Authentication**: 
  - Do not modify JWT implementation without security review
  - Avoid hardcoded credentials (currently in mock auth client)
  - Never store passwords in plaintext (hashed via bcrypt)
- **API Endpoints**:
  - Currently only `/api/login` implemented for authentication - avoid exposing credential management endpoints without proper security review
  - Validate and sanitize all inputs (FormRequest validation)
  - Implement proper authorization checks
- **Environment**:
  - Never commit `.env` with real secrets
  - Use different keys for development vs production
  - Keep debug mode off in production
  - Do not commit bootstrap/cache files to version control

### Deprecated Patterns
- **Backend**:
  - Don't create models without factories and seeders
  - Avoid raw SQL queries - use Eloquent or query builder
  - Don't create verification scripts when tests exist
  - Avoid modifying base Laravel folders without approval
  - Don't modify input data directly in service layers (work on copies)
  - Don't perform multiple model operations without database transactions
- **Frontend**:
  - Don't modify global CSS directly - use theme providers
  - Avoid inline styles when possible - use MUI sx prop or CSS modules
  - Don't block the main thread with heavy computations
  - Avoid direct DOM manipulation - use React refs when necessary
- **General**:
  - Don't create new base folders without approval
  - Avoid changing dependencies without team approval
  - Don't commit debugging statements (console.log, dd(), etc.)
  - Avoid mixing PHP short tags - use full `<?php ?>` tags

## 6. Recent Improvements (from code review)

Based on a recent code review, the following improvements were identified and should be addressed:
- Fix CredentialResource incorrectly referencing `$this->login` instead of `$this->username`
- Ensure service layers work on copies of input data to avoid side effects
- Optimize tag synchronization to avoid unnecessary delete/insert operations
- Add query parameter validation for list and search endpoints
- Extract duplicate pagination logic in service classes
- Implement database transactions for operations spanning multiple models
- Add application-wide logging for debugging and auditing
- Implement API versioning in route definitions
- Remove or implement the empty Helper class
- Add comprehensive API documentation (OpenAPI/Swagger)

## 7. Testing

- **Backend**:
  - Write tests for every code change
  - Use factories for test data
  - Test important failure modes
  - Run affected tests after changes
- **Frontend**:
  - Write unit tests for components and hooks
  - Test user interactions and edge cases
  - Use React Testing Library and Jest