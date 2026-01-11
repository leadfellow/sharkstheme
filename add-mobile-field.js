#!/usr/bin/env node
/**
 * Script to add 'show_on_mobile' field to all ACF block JSON files
 */
const fs = require('fs');
const path = require('path');

// ACF JSON directory
const acfDir = path.join(__dirname, 'acf-json');

// Mobile visibility field definition
const createMobileField = (groupKey) => ({
    key: `${groupKey}_show_on_mobile`,
    label: "Kuva mobiilis",
    name: "show_on_mobile",
    type: "true_false",
    instructions: "Määra, kas see blokk kuvatakse mobiilseadmetes (alla 768px)",
    required: 0,
    default_value: 1,
    ui: 1,
    ui_on_text: "Jah",
    ui_off_text: "Ei",
    wrapper: {
        width: "50"
    }
});

function addMobileFieldToJson(filePath) {
    try {
        const data = JSON.parse(fs.readFileSync(filePath, 'utf8'));
        
        // Skip if not a block group or if field already exists
        if (!data.fields) {
            console.log(`⏭️  Skipping ${path.basename(filePath)} (no fields)`);
            return false;
        }
        
        // Check if show_on_mobile field already exists
        const hasField = data.fields.some(field => field.name === 'show_on_mobile');
        if (hasField) {
            console.log(`✓ ${path.basename(filePath)} already has mobile field`);
            return false;
        }
        
        // Find anchor field index
        const anchorIndex = data.fields.findIndex(field => field.name === 'block_anchor');
        
        // Create mobile field with unique key
        const mobileField = createMobileField(data.key || 'group');
        
        // Insert after anchor or at the beginning
        const insertPos = anchorIndex >= 0 ? anchorIndex + 1 : 0;
        data.fields.splice(insertPos, 0, mobileField);
        
        // Write back to file with proper formatting
        fs.writeFileSync(filePath, JSON.stringify(data, null, 4) + '\n', 'utf8');
        
        console.log(`✅ Added mobile field to ${path.basename(filePath)}`);
        return true;
        
    } catch (error) {
        console.error(`❌ Error processing ${path.basename(filePath)}:`, error.message);
        return false;
    }
}

function main() {
    if (!fs.existsSync(acfDir)) {
        console.error(`❌ Directory ${acfDir} not found!`);
        return;
    }
    
    const files = fs.readdirSync(acfDir)
        .filter(file => file.startsWith('group_') && file.endsWith('.json'))
        .map(file => path.join(acfDir, file));
    
    if (files.length === 0) {
        console.error('❌ No ACF JSON files found!');
        return;
    }
    
    console.log(`Found ${files.length} ACF JSON files\n`);
    
    let updated = 0;
    files.sort().forEach(file => {
        if (addMobileFieldToJson(file)) {
            updated++;
        }
    });
    
    console.log(`\n✅ Updated ${updated} files`);
    console.log(`⏭️  Skipped ${files.length - updated} files`);
}

main();
