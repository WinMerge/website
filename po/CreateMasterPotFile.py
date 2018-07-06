#!/usr/bin/env python
# -*- coding: utf-8 -*-;

# Python script to create the POT file for the website
#
# Copyright 2009-2018 Tim Gerundt <tim@gerundt.de>
#
# This file is part of WinMerge. WinMerge is free software under the terms of the
# GNU General Public License. You should have received a copy of the license
# along with WinMerge.  If not, see <http://www.gnu.org/licenses/>.

import io
import os
from time import strftime
import re

def getPhpFiles(path):
    ''' Get all php files from a folder and his subfolders '''
    phpfiles = []
    for root, dirs, files in os.walk(path, topdown = True):
      for file in files:
        basename, extension = os.path.splitext(file)
        if str.lower(extension) == '.php' or str.lower(extension) == '.inc': #If a PHP file...
          phpfiles.append(os.path.join(root, file))
    return phpfiles

def getTranslationsFromPhpFile(filepath, translations):
    ''' Get the translations from a php file '''
    rGettext = re.compile('_e?\([\'](.+?)[\']', re.DOTALL)
    rGettextTestMultiLine = re.compile('_e?\([\']([^\'\n]+)\n')
    
    phpfile = io.open(filepath, 'r', encoding='utf-8', errors='ignore')
    lines = phpfile.readlines()
    phpfile.close()
    
    i = 0
    for line in lines: #For all lines...
        #--------------------------------------------------------------------------------
        # Multi-line translations...
        #--------------------------------------------------------------------------------
        tmps = rGettextTestMultiLine.findall(line)
        if tmps: #If found a multi-line gettext function...
            tmps = rGettext.findall("".join(lines[i:]))
            for tmp in tmps: #For all translations...
                if tmp.find('\n') > 0: #If a multi-line translation...
                    translation = tmp.replace('\r', '')
                    translation = translation.replace('\n', '\\n')
                    if translation in translations: #If the translation is already exists...
                        translations[translation] += [(filepath, i)]
                    else: #If the translation is NOT already exists...
                        translations[translation] = [(filepath, i)]
                    break #Use only the FIRST multi-line translation!
        #--------------------------------------------------------------------------------
        
        #--------------------------------------------------------------------------------
        # Normal translations...
        #--------------------------------------------------------------------------------
        i += 1
        tmps = rGettext.findall(line)
        if tmps: #If found a gettext function...
            for tmp in tmps: #For all translations...
                translation = tmp
                if translation in translations: #If the translation is already exists...
                    translations[translation] += [(filepath, i)]
                else: #If the translation is NOT already exists...
                    translations[translation] = [(filepath, i)]
        #--------------------------------------------------------------------------------

def main():
    translations = {}
    php_dir = os.path.abspath('../htdocs')
    php_files = getPhpFiles(php_dir)
    php_files.sort()
    for php_file in php_files: #For all php files...
        getTranslationsFromPhpFile(php_file, translations)
    
    potfile = io.open('en-US.pot', 'w', encoding='utf-8', errors='ignore', newline='\n')
    potfile.write('# This file is part from WinMerge <http://winmerge.org/>\n')
    potfile.write('# Released under the "GNU General Public License"\n')
    potfile.write('# \n')
    potfile.write('msgid ""\n')
    potfile.write('msgstr ""\n')
    potfile.write('"Project-Id-Version: WinMerge\\n"\n')
    potfile.write('"Report-Msgid-Bugs-To: http://bugs.winmerge.org\\n"\n')
    potfile.write('"POT-Creation-Date: %s\\n"\n' % strftime('%Y-%m-%d %H:%M+0000'))
    potfile.write('"PO-Revision-Date: \\n"\n')
    potfile.write('"Last-Translator: \\n"\n')
    potfile.write('"Language-Team: English <winmerge-translate@lists.sourceforge.net>\\n"\n')
    potfile.write('"MIME-Version: 1.0\\n"\n')
    potfile.write('"Content-Type: text/plain; charset=utf-8\\n"\n')
    potfile.write('"Content-Transfer-Encoding: 8bit\\n"\n')
    potfile.write('"X-Poedit-Language: English\\n"\n')
    potfile.write('"X-Poedit-SourceCharset: utf-8\\n"\n')
    potfile.write('"X-Poedit-Basepath: ../htdocs/\\n"\n')
    potfile.write('\n')
    for translation in translations: #For all translations...
        #--------------------------------------------------------------------------------
        # References...
        #--------------------------------------------------------------------------------
        reference_line = ''
        references = translations[translation]
        for reference in references: #For all references...
            reference_path = reference[0].replace(php_dir + os.sep, '') #Switch to relative path
            reference_path = reference_path.replace('\\', '/') #Switch to linux path separator
            reference_id = '%s:%u' % (reference_path, reference[1])
            if reference_line: #If NOT first reference...
                if len(reference_line + reference_id) > 77: #If reference line to long...
                    potfile.write('%s\n' % reference_line)
                    reference_line = '#: ' + reference_id
                else: #If reference line NOT to long...
                    reference_line += ' ' + reference_id
            else: #If first reference...
                reference_line = '#: ' + reference_id
        if reference_line: #If reference line exists...
            potfile.write('%s\n' % reference_line)
        #--------------------------------------------------------------------------------
        potfile.write('#, c-format\n')
        potfile.write('msgid "%s"\n' % translation.replace('"', '\\"'))
        potfile.write('msgstr ""\n')
        potfile.write('\n')
    potfile.close()

# MAIN #
if __name__ == "__main__":
    main()
