# 📄 Technical Case Study: Hybrid Cloud Data Architecture

**Project:** Proprietary AI Verdict Engine (SaaS)
**Role:** Lead Infrastructure Architect
**Stack:** WordPress (LEMP/CloudPanel), Google Cloud SQL (PostgreSQL), PHP 8.4
**Context:** Creating a defensible data pipeline for a high-volume Real-Time Analysis application.

## 1. Executive Summary
To support a custom "Speculative Design" AI engine, the architecture required a split-database strategy: standard MySQL for the application layer and a dedicated, high-compliance PostgreSQL instance (Google Cloud SQL) for storing complex JSON logs and "Inflammatory Correlation Index" (ICI) data.

**The Challenge:** The default LEMP stack (Linux, Nginx, MySQL, PHP) on the host VPS was optimized for MySQL only. The PHP `pdo_pgsql` driver required for communicating with the remote Google Cloud instance was missing from the production environment, blocking the data pipeline.

## 2. Diagnostic Protocol
Instead of relying on assumption, I deployed a non-destructive "Truth Test" snippet to the live environment to query the PHP extension list programmatically.

**Diagnostic Code (PHP):**
```php
/*
 * Task: Programmatic verification of driver availability
 */
if (extension_loaded('pdo_pgsql')) {
    // Return Success Banner
} else {
    // Return Critical Failure Alert
}
```
https://github.com/teresakaylor/portfolio/blob/main/code-samples/postgres-driver-test.php

Result: The diagnostic returned a Negative (Red Banner), confirming the driver was absent at the server level.

3. Remediation & Execution (DevOps)
I executed a root-level intervention via SSH to patch the PHP environment without disrupting site uptime.

Strategy: "Shotgun Deployment." To ensure resilience against future PHP version toggling (e.g., switching versions for testing), I installed the PostgreSQL drivers for the entire supported PHP version stack simultaneously.

Command Execution:

```Bash
# 1. Update Package Repositories
sudo apt update

# 2. Install PostgreSQL Drivers for PHP 8.1 - 8.4
sudo apt install -y php8.1-pgsql php8.2-pgsql php8.3-pgsql php8.4-pgsql

# 3. Restart PHP-FPM Service to load new configurations
sudo systemctl restart php8.1-fpm php8.2-fpm php8.3-fpm php8.4-fpm
```

4. Verification & Validation
Post-Deployment Check:

Cache Clearing: Purged Application and Varnish cache (varnish-cache:purge) to remove stale headers.

Re-Test: Re-ran the diagnostic snippet.

Outcome: Positive (Green Banner). The pdo_pgsql driver is now active and capable of handling SSL-encrypted connections to the Google Cloud Sandbox instance.

5. Architectural Benefit
By enabling PostgreSQL support, the application can now leverage the JSONB column type. This allows the AI's unstructured output (Verdict, Reasoning, Sentiment) to be queried and indexed efficiently—a capability that standard MySQL lacks. This decision ensures the data asset remains defensible for future machine learning retraining.
