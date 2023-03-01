<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Circular\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Special domain model class for direct mail records.
 */
class SysDmail extends AbstractEntity
{
    /**
     * @var int
     */
    protected $type = 0;

    /**
     * @var int
     */
    protected $page = 0;

    /**
     * @var string
     */
    protected $subject = '';

    /**
     * @var string
     */
    protected $fromEmail = '';

    /**
     * @var string
     */
    protected $fromName = '';

    /**
     * @var string
     */
    protected $replytoEmail = '';

    /**
     * @var string
     */
    protected $replytoName = '';

    /**
     * @var string
     */
    protected $organisation = '';

    /**
     * @var int
     */
    protected $priority = 3;

    /**
     * @var string
     */
    protected $encoding = 'quoted-printable';

    /**
     * @var string
     */
    protected $charset = 'utf-8';

    /**
     * sendOptions
     * 3 is default value as defined in TCA of direct_mail
     *
     * @var int
     */
    protected $sendOptions = 3;

    /**
     * @var int
     */
    protected $includeMedia = 0;

    /**
     * @var int
     */
    protected $flowedFormat = 0;

    /**
     * @var string
     */
    protected $htmlparams = '';

    /**
     * @var string
     */
    protected $plainparams = '&type=99';

    /**
     * @var bool
     */
    protected $issent = false;

    /**
     * @var int
     */
    protected $renderedsize = 0;

    /**
     * @var string
     */
    protected $mailContent = '';

    /**
     * @var int
     */
    protected $scheduled = 0;

    /**
     * @var string
     */
    protected $queryInfo = '';

    /**
     * @var int
     */
    protected $scheduledBegin = 0;

    /**
     * @var int
     */
    protected $scheduledEnd = 0;

    /**
     * @var string
     */
    protected $returnPath = '';

    /**
     * @var bool
     */
    protected $useDomain = true;

    /**
     * @var bool
     */
    protected $useRdct = true;

    /**
     * @var string
     */
    protected $longLinkRdctUrl = '';

    /**
     * @var bool
     */
    protected $longLinkMode = true;

    /**
     * @var string
     */
    protected $authcodeFieldlist = '';

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    public function getFromEmail(): string
    {
        return $this->fromEmail;
    }

    public function setFromEmail(string $fromEmail): void
    {
        $this->fromEmail = $fromEmail;
    }

    public function getFromName(): string
    {
        return $this->fromName;
    }

    public function setFromName(string $fromName): void
    {
        $this->fromName = $fromName;
    }

    public function getReplytoEmail(): string
    {
        return $this->replytoEmail;
    }

    public function setReplytoEmail(string $replytoEmail): void
    {
        $this->replytoEmail = $replytoEmail;
        $this->returnPath = $replytoEmail;
    }

    public function getReplytoName(): string
    {
        return $this->replytoName;
    }

    public function setReplytoName(string $replytoName): void
    {
        $this->replytoName = $replytoName;
    }

    public function getOrganisation(): string
    {
        return $this->organisation;
    }

    public function setOrganisation(string $organisation): void
    {
        $this->organisation = $organisation;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): void
    {
        $this->priority = $priority;
    }

    public function getEncoding(): string
    {
        return $this->encoding;
    }

    public function setEncoding(string $encoding): void
    {
        $this->encoding = $encoding;
    }

    public function getCharset(): string
    {
        return $this->charset;
    }

    public function setCharset(string $charset): void
    {
        $this->charset = $charset;
    }

    public function getSendOptions(): int
    {
        return $this->sendOptions;
    }

    public function setSendOptions(int $sendOptions): void
    {
        $this->sendOptions = $sendOptions;
    }

    public function getIncludeMedia(): int
    {
        return $this->includeMedia;
    }

    public function setIncludeMedia(int $includeMedia): void
    {
        $this->includeMedia = $includeMedia;
    }

    public function getFlowedFormat(): int
    {
        return $this->flowedFormat;
    }

    public function setFlowedFormat(int $flowedFormat): void
    {
        $this->flowedFormat = $flowedFormat;
    }

    public function getHtmlparams(): string
    {
        return $this->htmlparams;
    }

    public function setHtmlparams(string $htmlparams): void
    {
        $this->htmlparams = $htmlparams;
    }

    public function getPlainparams(): string
    {
        return $this->plainparams;
    }

    public function setPlainparams(string $plainparams): void
    {
        $this->plainparams = $plainparams;
    }

    public function getIssent(): bool
    {
        return $this->issent;
    }

    public function setIssent(bool $issent): void
    {
        $this->issent = $issent;
    }

    public function getRenderedsize(): int
    {
        return $this->renderedsize;
    }

    public function setRenderedsize(int $renderedsize): void
    {
        $this->renderedsize = $renderedsize;
    }

    public function getMailContent(): string
    {
        return $this->mailContent;
    }

    public function setMailContent(string $mailContent): void
    {
        $this->mailContent = $mailContent;
        $this->renderedsize = strlen($mailContent);
    }

    public function getScheduled(): int
    {
        return $this->scheduled;
    }

    public function setScheduled(int $scheduled): void
    {
        $this->scheduled = $scheduled;
    }

    public function getQueryInfo(): string
    {
        return $this->queryInfo;
    }

    public function setQueryInfo(string $queryInfo): void
    {
        $this->queryInfo = $queryInfo;
    }

    public function getScheduledBegin(): int
    {
        return $this->scheduledBegin;
    }

    public function setScheduledBegin(int $scheduledBegin): void
    {
        $this->scheduledBegin = $scheduledBegin;
    }

    public function getScheduledEnd(): int
    {
        return $this->scheduledEnd;
    }

    public function setScheduledEnd(int $scheduledEnd): void
    {
        $this->scheduledEnd = $scheduledEnd;
    }

    public function getReturnPath(): string
    {
        return $this->returnPath;
    }

    public function setReturnPath(string $returnPath): void
    {
        $this->returnPath = $returnPath;
    }

    public function getUseDomain(): bool
    {
        return $this->useDomain;
    }

    public function setUseDomain(bool $useDomain): void
    {
        $this->useDomain = $useDomain;
    }

    public function getUseRdct(): bool
    {
        return $this->useRdct;
    }

    public function setUseRdct(bool $useRdct): void
    {
        $this->useRdct = $useRdct;
    }

    public function getLongLinkRdctUrl(): string
    {
        return $this->longLinkRdctUrl;
    }

    public function setLongLinkRdctUrl(string $longLinkRdctUrl): void
    {
        $this->longLinkRdctUrl = $longLinkRdctUrl;
    }

    public function getLongLinkMode(): bool
    {
        return $this->longLinkMode;
    }

    public function setLongLinkMode(bool $longLinkMode): void
    {
        $this->longLinkMode = $longLinkMode;
    }

    public function getAuthcodeFieldlist(): string
    {
        return $this->authcodeFieldlist;
    }

    public function setAuthcodeFieldlist(string $authcodeFieldlist): void
    {
        $this->authcodeFieldlist = $authcodeFieldlist;
    }
}
